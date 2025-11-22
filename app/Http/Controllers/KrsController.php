<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Kelas;
use App\Models\MahasiswaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF; // barryvdh/laravel-dompdf

class KrsController extends Controller
{
    protected $defaultMaxSks = 24;

    public function index()
    {
        $userId = Auth::id();

        $mahasiswaDetail = MahasiswaDetail::where('user_id', $userId)
            ->with('user')
            ->first();

        if (!$mahasiswaDetail) {
            return redirect('/dashboard')->with('error', 'Data mahasiswa tidak ditemukan');
        }

        $isKrsPeriod = true;

        $krsList = Krs::where('mahasiswa_user_id', $userId)
            ->with(['kelas.mataKuliah', 'kelas.dosenPengampu'])
            ->get();

        $totalSks = $krsList->sum(fn($k) => $k->kelas->mataKuliah->sks ?? 0);

        $takenKelasIds = $krsList->pluck('kelas_id')->toArray();
        $takenMkIds = $krsList->map(fn($x) => $x->kelas->mataKuliah->mk_id ?? null)->filter()->values()->all();

        $availableKelas = Kelas::with(['mataKuliah', 'dosenPengampu'])
            ->whereHas('mataKuliah.prodi', function ($q) use ($mahasiswaDetail) {
                $q->where('name', $mahasiswaDetail->program_studi)
                    ->orWhere('id', $mahasiswaDetail->program_studi);
            })
            ->get()
            ->reject(fn($kelas) => in_array($kelas->kelas_id, $takenKelasIds));

        $maxSks = $mahasiswaDetail->max_sks ?? $this->defaultMaxSks;

        return view('krs.index', compact(
            'mahasiswaDetail',
            'krsList',
            'isKrsPeriod',
            'totalSks',
            'availableKelas',
            'takenMkIds',
            'maxSks'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,kelas_id',
        ]);

        $userId = Auth::id();

        $kelas = Kelas::with('mataKuliah')->where('kelas_id', $request->kelas_id)->first();
        if (!$kelas) return back()->with('error', 'Kelas tidak ditemukan');

        // 1. kapasitas
        if ((int)$kelas->kapasitas <= 0) {
            return back()->with('error', 'Kapasitas kelas ini sudah penuh');
        }

        // 2. Cek MK sudah diambil (satu MK satu kelas)
        $mkId = $kelas->mk_id ?? ($kelas->mataKuliah->mk_id ?? null);
        if (!$mkId) return back()->with('error', 'Data mata kuliah tidak lengkap');

        $alreadyTakenMk = Krs::where('mahasiswa_user_id', $userId)
            ->whereHas('kelas.mataKuliah', fn($q) => $q->where('mk_id', $mkId))
            ->exists();

        if ($alreadyTakenMk) {
            return back()->with('error', 'Anda sudah mengambil mata kuliah ini di kelas lain (satu MK = satu kelas).');
        }

        // 3. Max SKS
        $mahasiswaDetail = MahasiswaDetail::where('user_id', $userId)->first();
        $maxSks = $mahasiswaDetail->max_sks ?? $this->defaultMaxSks;
        $currentSks = Krs::where('mahasiswa_user_id', $userId)
            ->with('kelas.mataKuliah')
            ->get()
            ->sum(fn($k) => $k->kelas->mataKuliah->sks ?? 0);
        if ($currentSks + ($kelas->mataKuliah->sks ?? 0) > $maxSks) {
            return back()->with('error', "Mengambil kelas ini melebihi batas maksimal SKS ({$maxSks}). Saat ini: {$currentSks} SKS.");
        }

        // 4. Cek bentrok jadwal: bandingkan semua kelas yang diambil
        $takenKelas = Krs::where('mahasiswa_user_id', $userId)
            ->with('kelas')
            ->get()
            ->pluck('kelas')
            ->filter();

        foreach ($takenKelas as $t) {
            if ($this->isTimeOverlap($t->hari, $t->jam_mulai, $t->jam_selesai, $kelas->hari, $kelas->jam_mulai, $kelas->jam_selesai)) {
                return back()->with('error', 'Jadwal kelas ini bertabrakan dengan kelas yang sudah Anda ambil: ' . ($t->nama_kelas ?? ''));
            }
        }

        // 5. Simpan dalam transaksi & lock kelas
        try {
            DB::beginTransaction();

            $kelasForUpdate = Kelas::where('kelas_id', $kelas->kelas_id)->lockForUpdate()->first();
            if ((int)$kelasForUpdate->kapasitas <= 0) {
                DB::rollBack();
                return back()->with('error', 'Kapasitas kelas ini sudah penuh (cek terakhir).');
            }

            Krs::create([
                'mahasiswa_user_id' => $userId,
                'kelas_id' => $kelas->kelas_id,
                'status_krs' => 'diambil',
                'tanggal_ambil' => now(),
            ]);

            $kelasForUpdate->decrement('kapasitas');

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('KRS store error: ' . $e->getMessage());
            return back()->with('error', 'Gagal menambahkan KRS: ' . $e->getMessage());
        }

        return redirect()->route('krs.index')->with('success', 'Mata kuliah berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $userId = Auth::id();

        $krs = Krs::where('krs_id', $id)
            ->where('mahasiswa_user_id', $userId)
            ->with('kelas')
            ->first();

        if (!$krs) return back()->with('error', 'KRS tidak ditemukan');

        if ($krs->status_krs !== 'diambil') {
            return back()->with('error', 'Hanya KRS dengan status "diambil" yang dapat dibatalkan');
        }

        try {
            DB::beginTransaction();
            $kelasForUpdate = Kelas::where('kelas_id', $krs->kelas->kelas_id)->lockForUpdate()->first();
            $kelasForUpdate->increment('kapasitas');
            $krs->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membatalkan KRS: ' . $e->getMessage());
        }

        return redirect()->route('krs.index')->with('success', 'Mata kuliah berhasil dibatalkan');
    }

    // helper: cek overlap (hari sama dan waktu overlap)
    protected function isTimeOverlap($hariA, $startA, $endA, $hariB, $startB, $endB)
    {
        // jika hari berbeda -> no conflict
        if (trim(strtolower($hariA)) !== trim(strtolower($hariB))) return false;

        // handle nulls
        if (!$startA || !$endA || !$startB || !$endB) return false;

        $aStart = strtotime($startA);
        $aEnd = strtotime($endA);
        $bStart = strtotime($startB);
        $bEnd = strtotime($endB);

        // overlap if aStart < bEnd and bStart < aEnd
        return ($aStart < $bEnd) && ($bStart < $aEnd);
    }

    // Cetak PDF
    public function cetakPdf()
    {
        $userId = Auth::id();
        $mahasiswaDetail = MahasiswaDetail::where('user_id', $userId)->first();
        $krsList = Krs::where('mahasiswa_user_id', $userId)
            ->with('kelas.mataKuliah', 'kelas.dosenPengampu')
            ->get();

        $pdf = PDF::loadView('krs.print_krs', compact('mahasiswaDetail', 'krsList'))
            ->setPaper('A4', 'portrait');

        $fileName = 'KRS_' . $mahasiswaDetail->nim . '_' . date('Ymd') . '.pdf';
        return $pdf->download($fileName);
    }
}
