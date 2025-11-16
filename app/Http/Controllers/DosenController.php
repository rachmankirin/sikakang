<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // <-- Tambahkan ini
use App\Models\Kelas;
use App\Models\SpadaSubmission;

class DosenController extends Controller
{
    /**
     * Menampilkan halaman dashboard untuk dosen.
     */
    public function dashboard()
    {
        /** @var \App\Models\User|null $dosen */
        // Untuk testing, gunakan user pertama sebagai data dosen.
        $dosen = User::first();

        // Jika tidak ada user sama sekali di database, tampilkan pesan error.
        if (!$dosen) {
            abort(404, 'Tidak ada data user di database untuk ditampilkan. Silakan lakukan seeding data terlebih dahulu.');
        }

        // Menggunakan nama relasi 'kelasMengampu'
        $kelasDiampu = $dosen->kelasMengampu()->with('mataKuliah')->get();
        $jumlahKelas = $kelasDiampu->count();

        // Menghitung total mahasiswa unik dari semua kelas yang diampu
        $kelasIds = $kelasDiampu->pluck('kelas_id');
        $totalMahasiswa = \App\Models\Krs::whereIn('kelas_id', $kelasIds)->distinct('mahasiswa_user_id')->count();

        // Menghitung tugas yang perlu dinilai
        $tugasPerluDinilai = SpadaSubmission::whereIn('activity_id', function ($query) use ($kelasIds) {
            $query->select('activity_id')->from('spada_activities')
                ->whereIn('section_id', function ($query) use ($kelasIds) {
                    $query->select('section_id')->from('spada_sections')
                        ->whereIn('spada_course_id', function ($query) use ($kelasIds) { // Perbaikan: seharusnya spada_course_id
                            $query->select('spada_course_id')->from('spada_courses') // Perbaikan: seharusnya spada_course_id
                                ->whereIn('kelas_id', $kelasIds);
                        });
                });
        })->whereNull('nilai')->count();


        // Mengambil pengumuman terbaru yang dibuat oleh dosen
        $pengumuman = $dosen->pengumuman()->latest()->take(5)->get();

        return view('Dashboard.dashboard_dosen', [
            'dosen' => $dosen,
            'jumlahKelas' => $jumlahKelas,
            'totalMahasiswa' => $totalMahasiswa,
            'tugasPerluDinilai' => $tugasPerluDinilai,
            'pengumuman' => $pengumuman,
            'kelasDiampu' => $kelasDiampu,
        ]);
    }
}