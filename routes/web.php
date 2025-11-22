<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\HasilStudiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MhsController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\AdminPengajuanSuratController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Models\Fakultas;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
});

// Protected Routes (requires login)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        return view('pages.pengumuman');
    });

    Route::get('/pengumuman', function () {
        return view('pages.pengumuman');
    });

    // Mahasiswa Routes
    Route::middleware(['role:mahasiswa'])->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\DashboardMahasiswaController::class, 'index'])->name('dashboard');

        Route::get('/krs', [KrsController::class, 'index'])->name('krs.index');
        Route::post('/krs/store', [KrsController::class, 'store'])->name('krs.store');
        Route::delete('/krs/{id}', [KrsController::class, 'destroy'])->name('krs.destroy');
        Route::get('/hasil', [HasilStudiController::class, 'index']);
        Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');

        // Routes untuk detail jadwal
        Route::get('/jadwal/detail/{kode}', [\App\Http\Controllers\DetailMataKuliahController::class, 'show'])->name('jadwal.detail');
        Route::get('/jadwal/detail/{kode}/rps', [\App\Http\Controllers\DetailMataKuliahController::class, 'rps'])->name('jadwal.detail.rps');
        Route::get('/jadwal/detail/{kode}/jurnal', [\App\Http\Controllers\DetailMataKuliahController::class, 'jurnal'])->name('jadwal.detail.jurnal');
        Route::get('/jadwal/detail/{kode}/rekap', [\App\Http\Controllers\DetailMataKuliahController::class, 'rekap'])->name('jadwal.detail.rekap');
        
        // Routes untuk validasi jurnal mahasiswa
        Route::get('/jadwal/detail/{kode}/validasi', [\App\Http\Controllers\JurnalValidasiController::class, 'index'])->name('jadwal.detail.validasi');
        Route::post('/jurnal/{jurnalId}/validate', [\App\Http\Controllers\JurnalValidasiController::class, 'validate'])->name('jurnal.validate');

        Route::get('/profile/mahasiswa', [\App\Http\Controllers\ProfileMahasiswaController::class, 'show'])->name('mahasiswa.profile');
        Route::get('/profile/mahasiswa/edit', [\App\Http\Controllers\ProfileMahasiswaController::class, 'edit'])->name('mahasiswa.profile.edit');
        Route::post('/profile/mahasiswa/update', [\App\Http\Controllers\ProfileMahasiswaController::class, 'update'])->name('mahasiswa.profile.update');

        Route::get('/mycourse', function () {
            return view('courses.mycourse');
        });

        Route::get('/incourse', function () {
            return view('courses.detailcourse');
        });

        Route::get('/registration/detail', [RegistrationController::class, 'detail'])
            ->name('registration.detail');

        Route::get('/tagihan', function () {
            return view('tagihan.tagihan_mahasiwa');
        })->name('tagihan.tagihan_mahasiswa');

        // Routes untuk Pengajuan Surat
        Route::get('/surat/riwayat', [PengajuanSuratController::class, 'index'])->name('surat.riwayat');
        Route::get('/surat/buat', [PengajuanSuratController::class, 'create'])->name('surat.create');
        Route::post('/surat', [PengajuanSuratController::class, 'store'])->name('surat.store');
        Route::get('/surat/{id}', [PengajuanSuratController::class, 'show'])->name('surat.show');
        Route::delete('/surat/{id}', [PengajuanSuratController::class, 'destroy'])->name('surat.destroy');
    });

    // Dosen Routes
    Route::middleware(['role:dosen'])->group(function () {
        Route::get('/dosen/dashboard', [DosenController::class, 'dashboard'])->name('dosen.dashboard');
        Route::get('/dosen', [DosenController::class, 'profile'])->name('dosen.profile');
        Route::get('/dosen/profile/edit', [DosenController::class, 'editProfile'])->name('dosen.profile.edit');
        Route::put('/dosen/profile', [DosenController::class, 'updateProfile'])->name('dosen.profile.update');
    });

    // Admin Routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard-admin', function () {
            return view('Dashboard.dashboard_admin');
        });
        Route::resource('/dashboard-admin/dosen', DosenController::class);
        Route::resource('/dashboard-admin/mahasiswa', MhsController::class);
        Route::resource('/dashboard-admin/fakultas', FakultasController::class);
        Route::resource('/dashboard-admin/mk', MataKuliahController::class);
        Route::resource('/dashboard-admin/prodi', ProdiController::class);

        // Admin - Verifikasi Pengajuan Surat
        Route::get('/dashboard-admin/pengajuan-surat', [AdminPengajuanSuratController::class, 'index'])->name('admin.surat.index');
        Route::post('/dashboard-admin/pengajuan-surat/{id}/approve', [AdminPengajuanSuratController::class, 'approve'])->name('admin.surat.approve');
        Route::post('/dashboard-admin/pengajuan-surat/{id}/reject', [AdminPengajuanSuratController::class, 'reject'])->name('admin.surat.reject');
    });

});
