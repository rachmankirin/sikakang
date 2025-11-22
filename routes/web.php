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
        Route::get('/dashboard', function () {
            // Contoh data dinamis untuk chart IPS
            $labels = ['Semester 1', 'Semester 2', 'Semester 3'];
            $ips    = [4.0, 4.0, 0.0];
            return view('Dashboard.dashboard_mahasiswa', compact('labels', 'ips'));
        })->name('dashboard');

        Route::get('/krs', [KrsController::class, 'index'])->name('krs.index');
        Route::post('/krs/store', [KrsController::class, 'store'])->name('krs.store');
        Route::delete('/krs/{id}', [KrsController::class, 'destroy'])->name('krs.destroy');
        Route::get('/hasil', [HasilStudiController::class, 'index']);
        Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');

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
        
        // Custom routes for mata kuliah (using kode_mk instead of id)
        Route::get('/dashboard-admin/mk', [MataKuliahController::class, 'index'])->name('mk.index');
        Route::post('/dashboard-admin/mk', [MataKuliahController::class, 'store'])->name('mk.store');
        Route::get('/dashboard-admin/mk/{kode}/edit', [MataKuliahController::class, 'edit'])->name('mk.edit');
        Route::put('/dashboard-admin/mk/{kode}', [MataKuliahController::class, 'update'])->name('mk.update');
        Route::delete('/dashboard-admin/mk/{kode}', [MataKuliahController::class, 'destroy'])->name('mk.destroy');
        
        Route::patch('/dashboard-admin/kelas/{id}/toggle-status', [MataKuliahController::class, 'toggleStatus'])->name('kelas.toggle-status');
        Route::resource('/dashboard-admin/prodi', ProdiController::class);

        // Admin - Verifikasi Pengajuan Surat
        Route::get('/dashboard-admin/pengajuan-surat', [AdminPengajuanSuratController::class, 'index'])->name('admin.surat.index');
        Route::post('/dashboard-admin/pengajuan-surat/{id}/approve', [AdminPengajuanSuratController::class, 'approve'])->name('admin.surat.approve');
        Route::post('/dashboard-admin/pengajuan-surat/{id}/reject', [AdminPengajuanSuratController::class, 'reject'])->name('admin.surat.reject');
    });

});
