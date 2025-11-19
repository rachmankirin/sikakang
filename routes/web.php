<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\HasilStudiController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MhsController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Models\Fakultas;

Route::get('/', function () {
    return view('pages.pengumuman');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/pengumuman', function () {
    return view('pages.pengumuman');
});


Route::get('/dashboard', function () {
    // Contoh data dinamis untuk chart IPS
    $labels = ['Semester 1', 'Semester 2', 'Semester 3'];
    $ips    = [4.0, 4.0, 0.0];

    // Pastikan nama view sesuai path sebenarnya (folder 'Dashboard')
    return view('Dashboard.dashboard_mahasiswa', compact('labels', 'ips'));
});
Route::get('/krs', [KrsController::class, 'index']);
Route::get('/hasil', [HasilStudiController::class, 'index']);
Route::get('/jadwal', function () {
    return view('Dashboard.jadwal_kuliah');
});
Route::get('/dashboard-admin', function () {
    return view('Dashboard.dashboard_admin');
});
Route::resource('/dashboard-admin/dosen', DosenController::class);

Route::resource('/dashboard-admin/mahasiswa', MhsController::class);

Route::resource('/dashboard-admin/fakultas', FakultasController::class);

Route::resource('/dashboard-admin/mk', MataKuliahController::class);
// Routes untuk detail jadwal
Route::get('/jadwal/detail/{kode}', function ($kode) {
    return view('Dashboard.jadwal_detail', compact('kode'));
});
Route::get('/jadwal/detail/{kode}/rps', function ($kode) {
    return view('Dashboard.jadwal_detail_rps', compact('kode'));
});
Route::get('/jadwal/detail/{kode}/jurnal', function ($kode) {
    return view('Dashboard.jadwal_detail', compact('kode'));
});
Route::get('/jadwal/detail/{kode}/rekap', function ($kode) {
    return view('Dashboard.jadwal_detail_rekap', compact('kode'));
});

// Route::middleware(['auth', 'verified'])->group(function () {
//     // ... route lainnya

//     // Route untuk Dashboard Dosen
//     Route::get('/dosen/dashboard', [DosenController::class, 'dashboard'])->name('dosen.dashboard');
// });
Route::get('/dosen/dashboard', [DosenController::class, 'dashboard'])->name('dosen.dashboard');

Route::get('/dosen/dashboard', function () {
    return view('Dashboard.dashboard_dosen');
});
Route::get('/dosen', function () {
    return view('Profile.Profile_dosen');
});
Route::get('/profile/mahasiswa', function () {
    // Example shape of data to ease back end integration
    $student = (object) [
        'name' => 'JAYNUDIN MALIK',
        'nim' => '33372400110',
        'nik' => '3671234567890001',
        'email' => 'jaynudin02@gmail.com',
        'agama' => 'Islam',
        'jenis_kelamin' => 'Laki-laki',
        'ttl' => 'Jakarta, 20 April 2002',
        'alamat' => 'Jalan Kemang Raya, RT 11 RW 2, Jakarta Selatan',
        'no_hp' => '08777778888',
        'status' => 'Aktif',
        'prodi' => 'Informatika',
        'angkatan' => '2024',
        'dosen_pembimbing' => 'Mohamad Hilman, S.Kom., M.T.I',
    ];

    // Optional demo data for academic history and registrations
    $histories = null; // let view fallback to sample unless provided
    $registrations = null; // let view fallback to sample unless provided

    return view('Profile.Profile_mahasiswa', compact('student', 'histories', 'registrations'));
});

// Edit profile routes (demo handlers)
Route::get('/profile/mahasiswa/edit', function () {
    $student = (object) [
        'name' => 'JAYNUDIN MALIK',
        'nim' => '33372400110',
        'nik' => '3671234567890001',
        'email' => 'jaynudin02@gmail.com',
        'agama' => 'Islam',
        'jenis_kelamin' => 'Laki-laki',
        'status_kawin' => 'Belum Menikah',
        'golongan_darah' => 'O',
        'tempat_lahir' => 'Jakarta',
        'tanggal_lahir' => '2002-04-20',
        'alamat' => 'Jalan Kemang Raya, RT 11 RW 2, Jakarta Selatan',
        'no_hp' => '08777778888',
    ];
    return view('Profile.user_edit', compact('student'));
})->name('profile.edit');

Route::post('/profile/mahasiswa/update', function () {
    // Di sini nantinya simpan ke database. Untuk demo, langsung kirim pesan sukses.
    return redirect()->back()->with('success', 'Data sudah diperbarui');
})->name('profile.update');

Route::get('/mycourse', function () {
    return view('courses.mycourse');
});

Route::get('/incourse', function () {
    return view('courses.detailcourse');
});

Route::resource('/dashboard-admin/prodi', ProdiController::class);

Route::get('/registration/detail', [RegistrationController::class, 'detail'])
    ->name('registration.registrasi');
