<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\HasilStudiController;
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

        Route::get('/krs', [KrsController::class, 'index']);
        Route::get('/hasil', [HasilStudiController::class, 'index']);
        Route::get('/jadwal', function () {
            return view('Dashboard.jadwal_kuliah');
        });

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
            return redirect()->back()->with('success', 'Data sudah diperbarui');
        })->name('profile.update');

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
        
        Route::get('/dosen', function () {
            return view('Profile.Profile_dosen');
        });
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
