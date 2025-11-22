<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\MahasiswaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Get mahasiswa detail
        $mahasiswaDetail = MahasiswaDetail::where('user_id', $userId)->with('user')->first();

        if (!$mahasiswaDetail) {
            return redirect('/dashboard')->with('error', 'Data mahasiswa tidak ditemukan');
        }

        // Get KRS yang sudah diambil mahasiswa dengan relasi kelas dan mata kuliah
        $krsList = Krs::where('mahasiswa_user_id', $userId)
            ->with(['kelas.mataKuliah', 'kelas.dosenPengampu'])
            ->get();

        // Group by hari
        $jadwalPerHari = $krsList->groupBy(function ($krs) {
            return $krs->kelas->hari;
        })->map(function ($kelasPerHari) {
            return $kelasPerHari->sortBy(function ($krs) {
                return $krs->kelas->jam_mulai;
            });
        });

        // Urutkan hari
        $urutanHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $jadwalPerHari = collect($urutanHari)
            ->mapWithKeys(function ($hari) use ($jadwalPerHari) {
                return [$hari => $jadwalPerHari->get($hari, collect())];
            })
            ->filter(function ($kelas) {
                return $kelas->isNotEmpty();
            });

        $totalMatkul = $krsList->count();

        return view('Dashboard.jadwal_kuliah', compact('mahasiswaDetail', 'jadwalPerHari', 'totalMatkul'));
    }
}
