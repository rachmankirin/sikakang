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

        // Get KRS yang sudah diambil mahasiswa
        $krsList = Krs::where('mahasiswa_user_id', $userId)
            ->with(['kelas.mataKuliah', 'kelas.dosenPengampu'])
            ->get();

        // Calculate total SKS
        $totalSks = $krsList->sum(function($krs) {
            return $krs->kelas->mataKuliah->sks ?? 0;
        });

        // Get available classes sesuai prodi mahasiswa
        $availableKelas = Kelas::with(['mataKuliah.prodi', 'dosenPengampu'])
            ->whereHas('mataKuliah.prodi', function($query) use ($mahasiswaDetail) {
                $query->where('name', $mahasiswaDetail->program_studi);
            })
            ->get();

        // Filter kelas yang belum diambil
        $takenKelasIds = $krsList->pluck('kelas_id')->toArray();
        $availableKelas = $availableKelas->reject(function($kelas) use ($takenKelasIds) {
            return in_array($kelas->kelas_id, $takenKelasIds);
        });

        return view('krs.index', compact(
            'mahasiswaDetail',
            'krsList',
            'totalSks',
            'availableKelas',
            'isKrsPeriod'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,kelas_id',
        ]);

        $userId = Auth::id();

        // Check if already taken
        $exists = Krs::where('mahasiswa_user_id', $userId)
            ->where('kelas_id', $request->kelas_id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Kelas ini sudah diambil');
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
