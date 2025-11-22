<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilStudiController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $mahasiswa = User::find($userId);
        $mahasiswaDetails = $mahasiswa->mahasiswaDetail;

        // Get all KRS data for the student
        $krsData = Krs::where('mahasiswa_user_id', $userId)
            ->whereIn('status_krs', ['diambil', 'disetujui'])
            ->with(['kelas.mataKuliah', 'kelas.dosenPengampu'])
            ->get();

        // Calculate total SKS
        $totalSKS = $krsData->sum(function ($krs) {
            return $krs->kelas->mataKuliah->sks ?? 0;
        });

        // IPS and IPK are 0 for now (will be calculated when nilai is implemented)
        $ips = 0;
        $ipk = 0;

        return view('hasil studi.hasilStudi', compact(
            'mahasiswa',
            'mahasiswaDetails',
            'krsData',
            'totalSKS',
            'ips',
            'ipk'
        ));
    }
}
