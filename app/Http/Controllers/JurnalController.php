<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Absensi;
use App\Models\DosenDetail;
use Illuminate\Http\Request;
use App\Models\MahasiswaDetail;
use App\Models\JurnalPerkuliahan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JurnalController extends Controller
{
    public function jadwal()
    {
        $user = auth()->user();
        $role = $user->role;

        $kelas = collect();
        $mahasiswaDetail = $user->mahasiswaDetail;
        $dosenDetail = $user->dosenDetail;

        if ($role === 'mahasiswa') {
            if ($mahasiswaDetail) {
                $kelas = Krs::with('kelas.mataKuliah', 'kelas.dosenPengampu')
                    ->where('mahasiswa_user_id', $user->user_id)
                    ->get()
                    ->map(fn($k) => $k->kelas);
            }
        } elseif ($role === 'dosen') {
            if ($dosenDetail) {
                $kelas = Kelas::with('mataKuliah', 'dosenPengampu')
                    ->where('dosen_pengampu_id', $user->user_id)
                    ->get();
            }
        }

        $totalMatkul = $kelas->count();
        $jadwalPerHari = $kelas->groupBy('hari');

        return view('Dashboard.jadwal_kuliah', compact(
            'kelas',
            'totalMatkul',
            'jadwalPerHari',
            'mahasiswaDetail',
            'dosenDetail',
            'role'
        ));
    }




    public function detail($nama_kelas, Request $request)
    {
        $user = Auth::user();

        $kelas = Kelas::with(['mataKuliah', 'dosenPengampu'])
            ->where('nama_kelas', urldecode($nama_kelas))
            ->firstOrFail();

        $kelas_id = $kelas->kelas_id;

        $jurnals = JurnalPerkuliahan::where('kelas_id', $kelas_id)
            ->orderBy('pertemuan_ke', 'asc')
            ->get();

        $selectedJurnalId = $request->query('jurnal') ?? ($jurnals->first()->jurnal_id ?? null);

        $selectedJurnal = $selectedJurnalId
            ? JurnalPerkuliahan::with('absensi')->find($selectedJurnalId)
            : null;

        $peserta = Krs::where('kelas_id', $kelas_id)
            ->join('mahasiswa_details', 'mahasiswa_details.user_id', '=', 'krs.mahasiswa_user_id')
            ->join('users', 'users.user_id', '=', 'mahasiswa_details.user_id')
            ->select('mahasiswa_details.user_id', 'mahasiswa_details.nim', 'users.nama_lengkap as nama')
            ->get()
            ->keyBy('user_id');

        $absensiMap = $selectedJurnal
            ? $selectedJurnal->absensi->keyBy('mahasiswa_user_id')
            : collect();

        $isDosen = $user->role === 'dosen';

        return view(
            'dashboard.jadwal_detail',
            compact(
                'kelas',
                'jurnals',
                'selectedJurnal',
                'peserta',
                'absensiMap',
                'isDosen',
                'nama_kelas',
                'kelas_id'
            )
        );
    }


    public function showRps($nama_kelas)
    {
        $kelas = Kelas::with(['mataKuliah', 'dosenPengampu'])
            ->where('nama_kelas', urldecode($nama_kelas))
            ->firstOrFail();

        return view('dashboard.jadwal_detail_rps', compact('kelas', 'nama_kelas'));
    }


    public function rekap($nama_kelas)
    {
        $nama_kelas = urldecode($nama_kelas);

        // Ambil kelas berdasarkan nama kelas
        $kelas = Kelas::with(['mataKuliah', 'dosenPengampu'])
            ->where('nama_kelas', $nama_kelas)
            ->firstOrFail();

        // Semua jurnal (pertemuan)
        $jurnals = JurnalPerkuliahan::with('absensi')
            ->where('kelas_id', $kelas->kelas_id)
            ->orderBy('pertemuan_ke')
            ->get();

        // Semua peserta kelas
        $peserta = Krs::where('kelas_id', $kelas->kelas_id)
            ->join('mahasiswa_details', 'mahasiswa_details.user_id', '=', 'krs.mahasiswa_user_id')
            ->join('users', 'users.user_id', '=', 'mahasiswa_details.user_id')
            ->select('users.user_id', 'users.nama_lengkap', 'mahasiswa_details.nim')
            ->get();

        // Hitung absensi untuk setiap mahasiswa
        foreach ($peserta as $mhs) {
            $hadirCount = 0;
            $absensiStatus = [];

            foreach ($jurnals as $jurnal) {
                $absensi = $jurnal->absensi->where('mahasiswa_user_id', $mhs->user_id)->first();
                $status = $absensi->status_kehadiran ?? 'alpa';

                $absensiStatus[$jurnal->jurnal_id] = $status;

                if ($status === 'hadir') {
                    $hadirCount++;
                }
            }

            $mhs->hadir = $hadirCount;
            $mhs->persentase = $jurnals->count() > 0
                ? round(($hadirCount / $jurnals->count()) * 100)
                : 0;
            $mhs->statusAbsensi = $absensiStatus;
        }

        return view('dashboard.jadwal_detail_rekap', [
            'kelas' => $kelas,
            'jurnals' => $jurnals,
            'peserta' => $peserta,
            'nama_kelas' => $nama_kelas
        ]);
    }


    public function storeJurnal(Request $request, $kelas_id)
    {
        if (Auth::user()->role !== 'dosen') abort(403);

        $request->validate([
            'pertemuan_ke' => 'required|integer',
            'tanggal_perkuliahan' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        JurnalPerkuliahan::create([
            'kelas_id' => $kelas_id,
            'pertemuan_ke' => $request->pertemuan_ke,
            'tanggal_perkuliahan' => $request->tanggal_perkuliahan,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'materi' => $request->materi,
            'metode_pembelajaran' => $request->metode_pembelajaran,
        ]);

        return back()->with('success', 'Pertemuan berhasil dibuat');
    }

    public function storeAbsensi(Request $request, $jurnal_id)
    {
        if (Auth::user()->role !== 'dosen') abort(403);

        DB::transaction(function () use ($request, $jurnal_id) {
            foreach ($request->mahasiswa_user_id as $userId => $value) {
                Absensi::updateOrCreate(
                    [
                        'jurnal_id' => $jurnal_id,
                        'mahasiswa_user_id' => $userId,
                    ],
                    [
                        'status_kehadiran' => $request->status_kehadiran[$userId] ?? 'alpa',
                        'waktu_absen' => now(),
                        'keterangan' => $request->keterangan[$userId] ?? null,
                    ]
                );
            }
        });

        return back()->with('success', 'Absensi tersimpan');
    }
}
