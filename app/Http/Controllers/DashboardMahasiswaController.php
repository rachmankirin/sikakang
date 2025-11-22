<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardMahasiswaController extends Controller
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

        // Estimate semester count (assuming 20 SKS per semester average)
        $semesterCount = $totalSKS > 0 ? ceil($totalSKS / 20) : 1;

        // Get jadwal hari ini based on current day
        $hariIni = Carbon::now()->locale('id')->dayName; // Senin, Selasa, etc.
        
        $jadwalHariIni = $krsData->filter(function ($krs) use ($hariIni) {
            return $krs->kelas && $krs->kelas->hari === $hariIni;
        });

        // Dummy data for IPS chart (will be calculated from nilai later)
        $labels = ['Semester 1', 'Semester 2', 'Semester 3'];
        $ips = [0, 0, 0];
        $ipk = 0;

        return view('Dashboard.dashboard_mahasiswa', compact(
            'mahasiswa',
            'mahasiswaDetails',
            'labels',
            'ips',
            'ipk',
            'totalSKS',
            'semesterCount',
            'jadwalHariIni'
        ));
    }
}
