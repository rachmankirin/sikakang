<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Krs;
use Carbon\Carbon;

class DashboardMahasiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Ambil data mahasiswa
        $mahasiswaDetails = DB::table('mahasiswa_details')
            ->where('user_id', $user->user_id)
            ->first();
        
        // Ambil semua KRS mahasiswa
        $allKrs = Krs::with([
            'kelas.mataKuliah',
            'kelas.dosenPengampu'
        ])
        ->where('mahasiswa_user_id', $user->user_id)
        ->whereIn('status_krs', ['diambil', 'disetujui'])
        ->get();
        
        // Hitung total SKS yang pernah diambil
        $totalSKS = $allKrs->sum(function($krs) {
            return $krs->kelas->mataKuliah->sks ?? 0;
        });
        
        // Hitung IPK (untuk sementara 0 karena belum ada nilai)
        $ipk = 0;
        
        // Data IPS per semester (dummy dulu, nanti bisa dihitung dari nilai)
        $labels = ['Semester 1', 'Semester 2', 'Semester 3'];
        $ips = [0, 0, 0];
        
        // Hitung jumlah semester (estimasi dari angkatan)
        $currentYear = Carbon::now()->year;
        $angkatan = $mahasiswaDetails->angkatan ?? $currentYear;
        $semesterCount = max(1, ($currentYear - $angkatan) * 2 + (Carbon::now()->month >= 7 ? 1 : 0));
        
        // Ambil jadwal hari ini
        $hariIni = Carbon::now()->locale('id')->dayName; // Senin, Selasa, dst
        $jadwalHariIni = Krs::with([
            'kelas.mataKuliah',
            'kelas.dosenPengampu'
        ])
        ->where('mahasiswa_user_id', $user->user_id)
        ->whereIn('status_krs', ['diambil', 'disetujui'])
        ->whereHas('kelas', function($query) use ($hariIni) {
            $query->where('hari', $hariIni);
        })
        ->get()
        ->sortBy('kelas.jam_mulai');
        
        return view('Dashboard.dashboard_mahasiswa', [
            'mahasiswa' => $user,
            'mahasiswaDetails' => $mahasiswaDetails,
            'labels' => $labels,
            'ips' => $ips,
            'ipk' => $ipk,
            'totalSKS' => $totalSKS,
            'semesterCount' => $semesterCount,
            'jadwalHariIni' => $jadwalHariIni,
        ]);
    }
}
