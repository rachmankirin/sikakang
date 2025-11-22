<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\JurnalPerkuliahan;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailMataKuliahController extends Controller
{
    public function show($kodeMk)
    {
        $userId = Auth::id();

        // Find mata kuliah by kode
        $mataKuliah = MataKuliah::where('kode_mk', $kodeMk)->first();
        
        if (!$mataKuliah) {
            return redirect()->route('jadwal.index')->with('error', 'Mata kuliah tidak ditemukan');
        }

        // Get kelas that student is taking for this mata kuliah
        $krs = Krs::where('mahasiswa_user_id', $userId)
            ->whereHas('kelas', function($query) use ($mataKuliah) {
                $query->where('mk_id', $mataKuliah->mk_id);
            })
            ->with(['kelas.mataKuliah', 'kelas.dosenPengampu'])
            ->first();

        if (!$krs) {
            return redirect()->route('jadwal.index')->with('error', 'Anda belum mengambil mata kuliah ini');
        }

        $kelas = $krs->kelas;
        $dosen = $kelas->dosenPengampu;

        // Get all students in this class
        $mahasiswaList = Krs::where('kelas_id', $kelas->kelas_id)
            ->where('status_krs', 'diambil')
            ->with('mahasiswa.mahasiswaDetail')
            ->get()
            ->map(function($krs) {
                return $krs->mahasiswa;
            });

        $totalMahasiswa = $mahasiswaList->count();

        // Get jurnal perkuliahan (only fully validated)
        $jurnalList = JurnalPerkuliahan::where('kelas_id', $kelas->kelas_id)
            ->where('validasi_dosen', true)
            ->where('validasi_mahasiswa', true)
            ->orderBy('pertemuan_ke', 'asc')
            ->get();

        $totalPertemuan = $jurnalList->count();

        // Count jurnal needing validation
        $jurnalNeedingValidationCount = JurnalPerkuliahan::where('kelas_id', $kelas->kelas_id)
            ->where('validasi_dosen', true)
            ->where('validasi_mahasiswa', false)
            ->count();

        return view('Dashboard.jadwal_detail', compact(
            'mataKuliah',
            'kelas',
            'dosen',
            'totalMahasiswa',
            'mahasiswaList',
            'jurnalList',
            'totalPertemuan',
            'jurnalNeedingValidationCount'
        ));
    }

    public function rps($kodeMk)
    {
        $userId = Auth::id();

        $mataKuliah = MataKuliah::where('kode_mk', $kodeMk)->first();
        
        if (!$mataKuliah) {
            return redirect()->route('jadwal.index')->with('error', 'Mata kuliah tidak ditemukan');
        }

        $krs = Krs::where('mahasiswa_user_id', $userId)
            ->whereHas('kelas', function($query) use ($mataKuliah) {
                $query->where('mk_id', $mataKuliah->mk_id);
            })
            ->with(['kelas.mataKuliah', 'kelas.dosenPengampu'])
            ->first();

        if (!$krs) {
            return redirect()->route('jadwal.index')->with('error', 'Anda belum mengambil mata kuliah ini');
        }

        $kelas = $krs->kelas;
        $dosen = $kelas->dosenPengampu;

        // Count jurnal needing validation
        $jurnalNeedingValidationCount = JurnalPerkuliahan::where('kelas_id', $kelas->kelas_id)
            ->where('validasi_dosen', true)
            ->where('validasi_mahasiswa', false)
            ->count();

        return view('Dashboard.jadwal_detail_rps', compact('mataKuliah', 'kelas', 'dosen', 'jurnalNeedingValidationCount'));
    }

    public function jurnal($kodeMk)
    {
        $userId = Auth::id();

        $mataKuliah = MataKuliah::where('kode_mk', $kodeMk)->first();
        
        if (!$mataKuliah) {
            return redirect()->route('jadwal.index')->with('error', 'Mata kuliah tidak ditemukan');
        }

        $krs = Krs::where('mahasiswa_user_id', $userId)
            ->whereHas('kelas', function($query) use ($mataKuliah) {
                $query->where('mk_id', $mataKuliah->mk_id);
            })
            ->with(['kelas.mataKuliah', 'kelas.dosenPengampu'])
            ->first();

        if (!$krs) {
            return redirect()->route('jadwal.index')->with('error', 'Anda belum mengambil mata kuliah ini');
        }

        $kelas = $krs->kelas;
        $dosen = $kelas->dosenPengampu;

        // Get jurnal with absensi for current student (only fully validated)
        $jurnalList = JurnalPerkuliahan::where('kelas_id', $kelas->kelas_id)
            ->where('validasi_dosen', true)
            ->where('validasi_mahasiswa', true)
            ->with(['absensi' => function($query) use ($userId) {
                $query->where('mahasiswa_user_id', $userId);
            }])
            ->orderBy('pertemuan_ke', 'asc')
            ->get();

        // Count jurnal needing validation
        $jurnalNeedingValidationCount = JurnalPerkuliahan::where('kelas_id', $kelas->kelas_id)
            ->where('validasi_dosen', true)
            ->where('validasi_mahasiswa', false)
            ->count();

        return view('Dashboard.jadwal_detail_jurnal', compact('mataKuliah', 'kelas', 'dosen', 'jurnalList', 'jurnalNeedingValidationCount'));
    }

    public function rekap($kodeMk)
    {
        $userId = Auth::id();

        $mataKuliah = MataKuliah::where('kode_mk', $kodeMk)->first();
        
        if (!$mataKuliah) {
            return redirect()->route('jadwal.index')->with('error', 'Mata kuliah tidak ditemukan');
        }

        $krs = Krs::where('mahasiswa_user_id', $userId)
            ->whereHas('kelas', function($query) use ($mataKuliah) {
                $query->where('mk_id', $mataKuliah->mk_id);
            })
            ->with(['kelas.mataKuliah', 'kelas.dosenPengampu'])
            ->first();

        if (!$krs) {
            return redirect()->route('jadwal.index')->with('error', 'Anda belum mengambil mata kuliah ini');
        }

        $kelas = $krs->kelas;
        $dosen = $kelas->dosenPengampu;

        // Get all jurnal for this class (only fully validated)
        $jurnalList = JurnalPerkuliahan::where('kelas_id', $kelas->kelas_id)
            ->where('validasi_dosen', true)
            ->where('validasi_mahasiswa', true)
            ->orderBy('pertemuan_ke', 'asc')
            ->get();

        // Get absensi records for current student
        $absensiList = Absensi::where('mahasiswa_user_id', $userId)
            ->whereIn('jurnal_id', $jurnalList->pluck('jurnal_id'))
            ->with('jurnalPerkuliahan')
            ->get();

        // Calculate statistics
        $totalPertemuan = $jurnalList->count();
        $totalHadir = $absensiList->where('status_kehadiran', 'hadir')->count();
        $totalIzin = $absensiList->where('status_kehadiran', 'izin')->count();
        $totalSakit = $absensiList->where('status_kehadiran', 'sakit')->count();
        $totalAlpa = $absensiList->where('status_kehadiran', 'alpa')->count();
        
        $persentaseKehadiran = $totalPertemuan > 0 ? round(($totalHadir / $totalPertemuan) * 100, 1) : 0;

        // Count jurnal needing validation
        $jurnalNeedingValidationCount = JurnalPerkuliahan::where('kelas_id', $kelas->kelas_id)
            ->where('validasi_dosen', true)
            ->where('validasi_mahasiswa', false)
            ->count();

        return view('Dashboard.jadwal_detail_rekap', compact(
            'mataKuliah',
            'kelas',
            'dosen',
            'jurnalList',
            'absensiList',
            'totalPertemuan',
            'totalHadir',
            'totalIzin',
            'totalSakit',
            'totalAlpa',
            'persentaseKehadiran',
            'jurnalNeedingValidationCount'
        ));
    }
}
