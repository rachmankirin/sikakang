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
    /**
     * Tampilkan jadwal kuliah:
     * - mahasiswa => kelas yg dambil (KRS)
     * - dosen => kelas yg diajar
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'mahasiswa') {
            $mahasiswa = MahasiswaDetail::where('user_id', $user->user_id)->firstOrFail();

            $kelas = Krs::where('mahasiswa_user_id', $user->user_id)
                ->with(['kelas.mataKuliah', 'kelas.dosenPengampu'])
                ->get()
                ->pluck('kelas');
        } elseif ($user->role === 'dosen') {
            $dosen = DosenDetail::where('user_id', $user->user_id)->firstOrFail();

            $kelas = Kelas::where('dosen_pengampu_id', $dosen->dosen_detail_id)
                ->with(['mataKuliah', 'dosenPengampu'])
                ->get();
        } else {
            abort(403, 'Role tidak valid');
        }

        return view('jadwal.index', compact('kelas'));
    }

    /**
     * Tampilkan detail jurnal + daftar pertemuan
     * Dosen = bisa input
     * Mahasiswa = read only
     */
    public function show($kelas_id, Request $request)
    {
        $user = Auth::user();
        $idKelas = $kelas_id;

        $kelas = Kelas::with(['mataKuliah', 'dosenPengampu'])->findOrFail($kelas_id);

        $jurnals = JurnalPerkuliahan::where('kelas_id', $kelas_id)
            ->orderBy('pertemuan_ke', 'asc')
            ->get();

        $selectedJurnalId = $request->query('jurnal') ?? ($jurnals->first()->jurnal_id ?? null);
        $selectedJurnal = $selectedJurnalId ?
            JurnalPerkuliahan::with('absensi')->find($selectedJurnalId) : null;

        // Ambil peserta
        $mahasiswaUserIds = Krs::where('kelas_id', $kelas_id)
            ->pluck('mahasiswa_user_id')
            ->unique()
            ->toArray();

        $peserta = MahasiswaDetail::whereIn('mahasiswa_details.user_id', $mahasiswaUserIds)
            ->join('users', 'users.user_id', '=', 'mahasiswa_details.user_id')
            ->select(
                'mahasiswa_details.user_id',
                'mahasiswa_details.nim',
                'users.nama_lengkap as nama'
            )
            ->get()
            ->keyBy('user_id');


        // Absensi pivot map
        $absensiMap = $selectedJurnal
            ? $selectedJurnal->absensi->keyBy('mahasiswa_user_id')
            : collect();

        $isDosen = $user->role === 'dosen';

        return view('dashboard.jadwal_detail', compact(
            'kelas',
            'jurnals',
            'selectedJurnal',
            'peserta',
            'absensiMap',
            'isDosen',
            'idKelas'
        ));
    }


    /**
     * Rekap Absensi - Mahasiswa & Dosen bisa akses
     */
    public function rekap($idKelas)
    {
        $user = User::all();
        $kelas = Kelas::where('kelas_id', $idKelas)->first(); // tambahkan first()
        $jurnals = JurnalPerkuliahan::where('kelas_id', $idKelas)->get();

        return view('Dashboard.jadwal_detail_rekap', compact('user', 'kelas', 'jurnals'));
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

        $request->validate([
            'mahasiswa_user_id' => 'required|array',
            'status_kehadiran' => 'required|array',
        ]);

        DB::transaction(function () use ($request, $jurnal_id) {
            foreach ($request->mahasiswa_user_id as $userId => $user_id_value) {

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

    public function showRps($kelas_id)
    {
        $kelas = Kelas::with(['mataKuliah', 'dosenPengampu'])->findOrFail($kelas_id);

        return view('dashboard.jadwal_detail_rps', compact('kelas', 'kelas_id'));
    }

    public function showRekap($kelas_id)
    {
        $kelas = Kelas::with(['mataKuliah', 'dosenPengampu'])->findOrFail($kelas_id);
        $rekap = JurnalPerkuliahan::with('absensi')->where('kelas_id', $kelas_id)->get();

        return view('dashboard.jadwal_detail_rekap', compact('kelas', 'rekap', 'kelas_id'));
    }
}
