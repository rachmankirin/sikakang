<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\DosenDetail;
use App\Models\MahasiswaDetail;
use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\JenisSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        $admin = User::create([
            'nama_lengkap' => 'Administrator',
            'email' => 'admin@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Create Dosen Users
        $dosen1 = User::create([
            'nama_lengkap' => 'Yulian Arnsol, S. Kom, M. Kom',
            'email' => 'yulian@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);

        DosenDetail::create([
            'user_id' => $dosen1->user_id,
            'nidn' => '109002222040160',
            'jabatan_fungsional' => 'Lektor',
            'bidang_keahlian' => 'Pemrograman Web',
        ]);

        $dosen2 = User::create([
            'nama_lengkap' => 'Arief Rahmadi, S.Kom., M.T',
            'email' => 'arief@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);

        DosenDetail::create([
            'user_id' => $dosen2->user_id,
            'nidn' => '2513331005',
            'jabatan_fungsional' => 'Asisten Ahli',
            'bidang_keahlian' => 'E-Commerce',
        ]);

        $dosen3 = User::create([
            'nama_lengkap' => 'Mohamad Hilman, S.Kom., M.T.I',
            'email' => 'hilman@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);

        DosenDetail::create([
            'user_id' => $dosen3->user_id,
            'nidn' => '2513331092',
            'jabatan_fungsional' => 'Lektor',
            'bidang_keahlian' => 'Basis Data',
        ]);

        // Additional Dosen
        $dosen4 = User::create([
            'nama_lengkap' => 'Suprinanto, S.Kom., M.Kom.',
            'email' => 'suprinanto@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);
        DosenDetail::create([
            'user_id' => $dosen4->user_id,
            'nidn' => '2513331093',
            'jabatan_fungsional' => 'Asisten Ahli',
            'bidang_keahlian' => 'Sistem Basis Data',
        ]);

        $dosen5 = User::create([
            'nama_lengkap' => 'Arief Maman, S.Kom., M.T.',
            'email' => 'ariefmaman@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);
        DosenDetail::create([
            'user_id' => $dosen5->user_id,
            'nidn' => '2513331094',
            'jabatan_fungsional' => 'Lektor',
            'bidang_keahlian' => 'Sistem Operasi',
        ]);

        $dosen6 = User::create([
            'nama_lengkap' => 'Wicaksana, S.T., M.Eng.',
            'email' => 'wicaksana@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);
        DosenDetail::create([
            'user_id' => $dosen6->user_id,
            'nidn' => '2513331095',
            'jabatan_fungsional' => 'Lektor',
            'bidang_keahlian' => 'Internet of Things',
        ]);

        $dosen7 = User::create([
            'nama_lengkap' => 'Ningning Krisdayanti, S.Kom., M.Sc.',
            'email' => 'ningning@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);
        DosenDetail::create([
            'user_id' => $dosen7->user_id,
            'nidn' => '2513331096',
            'jabatan_fungsional' => 'Asisten Ahli',
            'bidang_keahlian' => 'Kecerdasan Artificial',
        ]);

        $dosen8 = User::create([
            'nama_lengkap' => 'Fathin Damyati, S.Kom., M.Kom.',
            'email' => 'fathin@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);
        DosenDetail::create([
            'user_id' => $dosen8->user_id,
            'nidn' => '2513331097',
            'jabatan_fungsional' => 'Lektor Kepala',
            'bidang_keahlian' => 'Pemrograman Web',
        ]);

        $dosen9 = User::create([
            'nama_lengkap' => 'Febriyanto Darnis, S.T., M.T.',
            'email' => 'febriyanto@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);
        DosenDetail::create([
            'user_id' => $dosen9->user_id,
            'nidn' => '2513331098',
            'jabatan_fungsional' => 'Asisten Ahli',
            'bidang_keahlian' => 'Algoritma',
        ]);

        $dosen10 = User::create([
            'nama_lengkap' => 'Hill Man, S.Kom., M.T.I.',
            'email' => 'hillman@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);
        DosenDetail::create([
            'user_id' => $dosen10->user_id,
            'nidn' => '2513331099',
            'jabatan_fungsional' => 'Lektor',
            'bidang_keahlian' => 'Jaringan Komputer',
        ]);

        $dosen11 = User::create([
            'nama_lengkap' => 'Yulian I Am Sorry, S.Kom., M.Kom.',
            'email' => 'yuliansorry@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);
        DosenDetail::create([
            'user_id' => $dosen11->user_id,
            'nidn' => '2513331100',
            'jabatan_fungsional' => 'Asisten Ahli',
            'bidang_keahlian' => 'E-Commerce',
        ]);

        $dosen12 = User::create([
            'nama_lengkap' => 'Miftahun Solihin, S.Kom., M.T.',
            'email' => 'miftahun@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);
        DosenDetail::create([
            'user_id' => $dosen12->user_id,
            'nidn' => '2513331101',
            'jabatan_fungsional' => 'Lektor',
            'bidang_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);

        $dosen13 = User::create([
            'nama_lengkap' => 'Mas Judin, S.T., M.Eng.',
            'email' => 'masjudin@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);
        DosenDetail::create([
            'user_id' => $dosen13->user_id,
            'nidn' => '2513331102',
            'jabatan_fungsional' => 'Asisten Ahli',
            'bidang_keahlian' => 'Sistem Informasi',
        ]);

        $dosen14 = User::create([
            'nama_lengkap' => 'Alwan NPD, S.Kom., M.Kom.',
            'email' => 'alwan@untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);
        DosenDetail::create([
            'user_id' => $dosen14->user_id,
            'nidn' => '2513331103',
            'jabatan_fungsional' => 'Lektor',
            'bidang_keahlian' => 'Data Mining',
        ]);

        // Create Fakultas
        $fakultasTeknik = Fakultas::create([
            'fakultas' => 'Fakultas Teknik',
        ]);

        $fakultasEkonomi = Fakultas::create([
            'fakultas' => 'Fakultas Ekonomi',
        ]);

        // Create Prodi
        $prodiInformatika = Prodi::create([
            'code' => 'IF001',
            'name' => 'Informatika',
            'fakultas_id' => $fakultasTeknik->id,
        ]);

        $prodiSistemInformasi = Prodi::create([
            'code' => 'SI001',
            'name' => 'Sistem Informasi',
            'fakultas_id' => $fakultasTeknik->id,
        ]);

        $prodiManajemen = Prodi::create([
            'code' => 'MN001',
            'name' => 'Manajemen',
            'fakultas_id' => $fakultasEkonomi->id,
        ]);

        // Create Mahasiswa Users
        $mahasiswa1 = User::create([
            'nama_lengkap' => 'JAYNUDIN MALIK',
            'email' => 'jaynudin02@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
        ]);

        MahasiswaDetail::create([
            'user_id' => $mahasiswa1->user_id,
            'nim' => '33372400110',
            'dosen_pa_id' => $dosen3->user_id,
            'angkatan' => '2024',
            'program_studi' => 'Informatika',
            'status_mahasiswa' => 'Aktif',
        ]);

        $mahasiswa2 = User::create([
            'nama_lengkap' => 'Budi Santoso',
            'email' => 'budi@student.untirta.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
        ]);

        MahasiswaDetail::create([
            'user_id' => $mahasiswa2->user_id,
            'nim' => '3337240001',
            'dosen_pa_id' => $dosen1->user_id,
            'angkatan' => '2024',
            'program_studi' => 'Informatika',
            'status_mahasiswa' => 'Aktif',
        ]);

        // Mata Kuliah akan ditambahkan oleh admin melalui dashboard
        
        // Create Jenis Surat
        JenisSurat::create([
            'nama_surat' => 'Surat Keterangan Aktif Kuliah',
            'persyaratan' => 'KTM aktif, Bukti pembayaran UKT semester berjalan',
            'estimasi_hari' => 3,
        ]);

        JenisSurat::create([
            'nama_surat' => 'Surat Pengantar Magang',
            'persyaratan' => 'Transkrip nilai minimal 100 SKS, Surat permohonan dari perusahaan',
            'estimasi_hari' => 5,
        ]);

        JenisSurat::create([
            'nama_surat' => 'Surat Keterangan Lulus',
            'persyaratan' => 'Ijazah, Transkrip nilai akhir, Surat bebas perpustakaan',
            'estimasi_hari' => 7,
        ]);

        JenisSurat::create([
            'nama_surat' => 'Surat Izin Penelitian',
            'persyaratan' => 'Proposal penelitian yang telah disetujui pembimbing, KTM aktif',
            'estimasi_hari' => 4,
        ]);

        JenisSurat::create([
            'nama_surat' => 'Surat Rekomendasi Beasiswa',
            'persyaratan' => 'IPK minimal 3.00, Transkrip nilai, Surat permohonan beasiswa',
            'estimasi_hari' => 5,
        ]);

        JenisSurat::create([
            'nama_surat' => 'Surat Keterangan Cuti Akademik',
            'persyaratan' => 'Surat permohonan cuti, Surat persetujuan orang tua, Bukti alasan cuti',
            'estimasi_hari' => 3,
        ]);

        $this->command->info('Database seeded successfully!');
    }
}
