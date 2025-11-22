<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Krs;

class HasilStudiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Ambil data mahasiswa
        $mahasiswaDetails = DB::table('mahasiswa_details')
            ->where('user_id', $user->user_id)
            ->first();
        
        // Ambil mata kuliah yang diambil mahasiswa (KRS)
        $krsData = Krs::with([
            'kelas.mataKuliah',
            'kelas.dosenPengampu'
        ])
        ->where('mahasiswa_user_id', $user->user_id)
        ->whereIn('status_krs', ['diambil', 'disetujui'])
        ->get();
        
        // Hitung total SKS yang diambil semester ini
        $totalSKS = $krsData->sum(function($krs) {
            return $krs->kelas->mataKuliah->sks ?? 0;
        });
        
        // Data untuk view
        $data = [
            'mahasiswa' => $user,
            'mahasiswaDetails' => $mahasiswaDetails,
            'krsData' => $krsData,
            'totalSKS' => $totalSKS,
            'ips' => 0, // Kosongkan dulu (belum ada nilai)
            'ipk' => 0, // Kosongkan dulu (belum ada nilai)
        ];
        
        return view('hasil studi.hasilStudi', $data);
    }
}
