<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Kelas;
use App\Models\MahasiswaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class KrsController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        
        // Get mahasiswa detail
        $mahasiswaDetail = MahasiswaDetail::where('user_id', $userId)->with('user')->first();
        
        if (!$mahasiswaDetail) {
            return redirect('/dashboard')->with('error', 'Data mahasiswa tidak ditemukan');
        }

        // KRS always open (no period restriction)
        $isKrsPeriod = true;

        // SKS limit constant
        $maxSks = 24;

        // Get KRS yang sudah diambil mahasiswa
        $krsList = Krs::where('mahasiswa_user_id', $userId)
            ->with(['kelas.mataKuliah', 'kelas.dosenPengampu'])
            ->get();

        // Calculate total SKS
        $totalSks = $krsList->sum(function($krs) {
            return $krs->kelas->mataKuliah->sks ?? 0;
        });

        // Calculate remaining SKS
        $remainingSks = $maxSks - $totalSks;

        // Get available classes sesuai prodi mahasiswa
        $availableKelas = Kelas::with(['mataKuliah.prodi', 'dosenPengampu'])
            ->whereHas('mataKuliah.prodi', function($query) use ($mahasiswaDetail) {
                $query->where('name', $mahasiswaDetail->program_studi);
            })
            ->get();

        // Get mk_id yang sudah diambil mahasiswa
        $takenMkIds = $krsList->pluck('kelas.mk_id')->unique()->toArray();
        
        // Filter kelas: 
        // 1. Tidak boleh kelas yang sudah diambil (exact kelas_id)
        // 2. Tidak boleh mata kuliah yang sudah diambil (mk_id sama)
        $takenKelasIds = $krsList->pluck('kelas_id')->toArray();
        $availableKelas = $availableKelas->reject(function($kelas) use ($takenKelasIds, $takenMkIds) {
            // Reject jika kelas sudah diambil
            if (in_array($kelas->kelas_id, $takenKelasIds)) {
                return true;
            }
            // Reject jika mata kuliah sudah diambil (di kelas lain)
            if (in_array($kelas->mk_id, $takenMkIds)) {
                return true;
            }
            return false;
        });

        return view('krs.index', compact(
            'mahasiswaDetail',
            'krsList',
            'totalSks',
            'availableKelas',
            'isKrsPeriod',
            'maxSks',
            'remainingSks'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,kelas_id',
        ]);

        $userId = Auth::id();
        $maxSks = 24;

        // Get kelas yang akan diambil
        $kelasYangDiambil = Kelas::with('mataKuliah')->findOrFail($request->kelas_id);

        // Check if already taken exact class
        $exists = Krs::where('mahasiswa_user_id', $userId)
            ->where('kelas_id', $request->kelas_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Kelas ini sudah diambil');
        }

        // Calculate current total SKS
        $currentTotalSks = Krs::where('mahasiswa_user_id', $userId)
            ->with('kelas.mataKuliah')
            ->get()
            ->sum(function($krs) {
                return $krs->kelas->mataKuliah->sks ?? 0;
            });

        // Check if adding this class would exceed SKS limit
        $sksYangAkanDiambil = $kelasYangDiambil->mataKuliah->sks ?? 0;
        if (($currentTotalSks + $sksYangAkanDiambil) > $maxSks) {
            return redirect()->back()->with('error', 'Tidak dapat mengambil mata kuliah ini. Total SKS akan melebihi batas maksimal ' . $maxSks . ' SKS. Anda sudah mengambil ' . $currentTotalSks . ' SKS, mata kuliah ini bernilai ' . $sksYangAkanDiambil . ' SKS.');
        }

        // Check if already taken same mata kuliah (different class)
        $sudahAmbilMataKuliah = Krs::where('mahasiswa_user_id', $userId)
            ->whereHas('kelas', function($query) use ($kelasYangDiambil) {
                $query->where('mk_id', $kelasYangDiambil->mk_id);
            })
            ->exists();

        if ($sudahAmbilMataKuliah) {
            return redirect()->back()->with('error', 'Anda sudah mengambil mata kuliah ' . $kelasYangDiambil->mataKuliah->nama_mk . ' di kelas lain. Tidak bisa mengambil kelas yang sama lebih dari satu kali.');
        }

        Krs::create([
            'mahasiswa_user_id' => $userId,
            'kelas_id' => $request->kelas_id,
            'status_krs' => 'diambil',
            'tanggal_ambil' => now(),
        ]);

        return redirect()->route('krs.index')->with('success', 'Mata kuliah berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $userId = Auth::id();

        $krs = Krs::where('krs_id', $id)
            ->where('mahasiswa_user_id', $userId)
            ->first();

        if (!$krs) {
            return redirect()->back()->with('error', 'KRS tidak ditemukan');
        }

        if ($krs->status_krs !== 'diambil') {
            return redirect()->back()->with('error', 'Hanya KRS dengan status "diambil" yang dapat dibatalkan');
        }

        $krs->delete();

        return redirect()->route('krs.index')->with('success', 'Mata kuliah berhasil dibatalkan');
    }
}
