<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\HasilStudiController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\AdminPengajuanSuratController;
use App\Http\Controllers\MhsController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\ProdiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Auth (guest only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
});

// Authenticated users
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', fn() => view('pages.pengumuman'));
    Route::get('/pengumuman', fn() => view('pages.pengumuman'));


    /*
    |--------------------------------------------------------------------------
    | 📌 Jadwal + Jurnal Perkuliahan (Akses: mahasiswa & dosen)
    |--------------------------------------------------------------------------
    */
    Route::get('/jadwal', [JurnalController::class, 'jadwal'])->name('jadwal.index');
    Route::get('/jadwal/detail/{nama_kelas}', [JurnalController::class, 'detail'])->name('jadwal.detail');
    Route::get('/jadwal/detail/{nama_kelas}/rps', [JurnalController::class, 'showRps'])->name('jadwal.detail.rps');
    Route::get('/jadwal/detail/{nama_kelas}/rekap', [JurnalController::class, 'rekap'])->name('jadwal.detail.rekap');


    /*
    |--------------------------------------------------------------------------
    | 👨‍🎓 Role: Mahasiswa
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:mahasiswa'])->group(function () {
        // CETAK KRS PDF
        Route::get('/krs/cetak/pdf', [KrsController::class, 'cetakPdf'])->name('krs.cetakPdf');

        Route::get('/dashboard', [\App\Http\Controllers\DashboardMahasiswaController::class, 'index'])->name('dashboard');

        Route::get('/krs', [KrsController::class, 'index'])->name('krs.index');
        Route::post('/krs/store', [KrsController::class, 'store'])->name('krs.store');
        Route::delete('/krs/{id}', [KrsController::class, 'destroy'])->name('krs.destroy');

        Route::get('/hasil', [HasilStudiController::class, 'index'])->name('hasil');

        // Profile Mahasiswa
        Route::get('/profile/mahasiswa', [App\Http\Controllers\ProfileMahasiswaController::class, 'show'])->name('mahasiswa.profile');
        Route::get('/profile/mahasiswa/edit', [App\Http\Controllers\ProfileMahasiswaController::class, 'edit'])->name('mahasiswa.profile.edit');
        Route::post('/profile/mahasiswa/update', [App\Http\Controllers\ProfileMahasiswaController::class, 'update'])->name('mahasiswa.profile.update');

        Route::get('/registration/detail', [RegistrationController::class, 'detail'])->name('registration.detail');

        /*
        | 📌 Tagihan Mahasiswa (Fix error Route not defined)
        */
        Route::get('/tagihan', function () {
            return view('tagihan.tagihan_mahasiwa');
        })->name('tagihan.tagihan_mahasiswa');


        // Pengajuan Surat
        Route::get('/surat/riwayat', [PengajuanSuratController::class, 'index'])->name('surat.riwayat');
        Route::get('/surat/buat', [PengajuanSuratController::class, 'create'])->name('surat.create');
        Route::post('/surat', [PengajuanSuratController::class, 'store'])->name('surat.store');
        Route::get('/surat/{id}', [PengajuanSuratController::class, 'show'])->name('surat.show');
        Route::delete('/surat/{id}', [PengajuanSuratController::class, 'destroy'])->name('surat.destroy');
    });


    /*
    |--------------------------------------------------------------------------
    | 👨‍🏫 Role: Dosen
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:dosen'])->group(function () {

        Route::get('/dosen/dashboard', [DosenController::class, 'dashboard'])->name('dosen.dashboard');

        Route::get('/dosen', [DosenController::class, 'profile'])->name('dosen.profile');
        Route::get('/dosen/profile/edit', [DosenController::class, 'editProfile'])->name('dosen.profile.edit');
        Route::put('/dosen/profile', [DosenController::class, 'updateProfile'])->name('dosen.profile.update');

        // Jurnal dan Absensi
        Route::post('/jadwal/{kelas_id}/jurnal', [JurnalController::class, 'storeJurnal'])->name('jurnal.store');
        Route::post('/jurnal/{jurnal_id}/absensi', [JurnalController::class, 'storeAbsensi'])->name('jurnal.absensi.store');
    });


    /*
    |--------------------------------------------------------------------------
    | 🛠 Role: Admin
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:admin'])->group(function () {

        Route::get('/dashboard-admin', fn() => view('Dashboard.dashboard_admin'))->name('dashboard.admin');

        Route::resource('/dashboard-admin/dosen', DosenController::class);
        Route::resource('/dashboard-admin/mahasiswa', MhsController::class);
        Route::resource('/dashboard-admin/fakultas', FakultasController::class);
        Route::resource('/dashboard-admin/mk', MataKuliahController::class);
        Route::resource('/dashboard-admin/prodi', ProdiController::class);

        // Pengajuan Surat Admin
        Route::get('/dashboard-admin/pengajuan-surat', [AdminPengajuanSuratController::class, 'index'])->name('admin.surat.index');
        Route::post('/dashboard-admin/pengajuan-surat/{id}/approve', [AdminPengajuanSuratController::class, 'approve'])->name('admin.surat.approve');
        Route::post('/dashboard-admin/pengajuan-surat/{id}/reject', [AdminPengajuanSuratController::class, 'reject'])->name('admin.surat.reject');
    });
});
