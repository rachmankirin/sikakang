<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\DosenDetail;
use App\Models\MahasiswaDetail;
use App\Models\MataKuliah;
use App\Models\Kelas;
use App\Models\Krs;
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

        // Create Mata Kuliah
        $mkPemweb = MataKuliah::create([
            'kode_mk' => 'RIK42213',
            'nama_mk' => 'Pemrograman Web',
            'sks' => 3,
            'deskripsi' => 'Mata kuliah yang mempelajari tentang pemrograman web',
        ]);

        $mkEcommerce = MataKuliah::create([
            'kode_mk' => 'RIK42113',
            'nama_mk' => 'E-Commerce',
            'sks' => 3,
            'deskripsi' => 'Mata kuliah yang mempelajari tentang e-commerce',
        ]);

        $mkBasdat = MataKuliah::create([
            'kode_mk' => 'RIK42207',
            'nama_mk' => 'Sistem Basis Data',
            'sks' => 3,
            'deskripsi' => 'Mata kuliah yang mempelajari tentang basis data',
        ]);

        $mkSisop = MataKuliah::create([
            'kode_mk' => 'RIK42203',
            'nama_mk' => 'Sistem Operasi',
            'sks' => 3,
            'deskripsi' => 'Mata kuliah yang mempelajari tentang sistem operasi',
        ]);

        $mkIot = MataKuliah::create([
            'kode_mk' => 'RIK42208',
            'nama_mk' => 'Internet of Things',
            'sks' => 3,
            'deskripsi' => 'Mata kuliah yang mempelajari tentang IoT',
        ]);

        // Create Kelas
        $kelasPemweb = Kelas::create([
            'mk_id' => $mkPemweb->mk_id,
            'dosen_pengampu_id' => $dosen1->user_id,
            'nama_kelas' => 'C-24',
            'tahun_ajar' => '2024/2025',
            'semester' => 'Ganjil',
            'kapasitas' => 40,
        ]);

        $kelasEcommerce = Kelas::create([
            'mk_id' => $mkEcommerce->mk_id,
            'dosen_pengampu_id' => $dosen2->user_id,
            'nama_kelas' => 'A-24',
            'tahun_ajar' => '2024/2025',
            'semester' => 'Ganjil',
            'kapasitas' => 40,
        ]);

        $kelasBasdat = Kelas::create([
            'mk_id' => $mkBasdat->mk_id,
            'dosen_pengampu_id' => $dosen3->user_id,
            'nama_kelas' => 'B-24',
            'tahun_ajar' => '2024/2025',
            'semester' => 'Ganjil',
            'kapasitas' => 40,
        ]);

        // Create KRS for Mahasiswa
        Krs::create([
            'mahasiswa_user_id' => $mahasiswa1->user_id,
            'kelas_id' => $kelasPemweb->kelas_id,
            'status_krs' => 'diambil',
            'tanggal_ambil' => now(),
        ]);

        Krs::create([
            'mahasiswa_user_id' => $mahasiswa1->user_id,
            'kelas_id' => $kelasEcommerce->kelas_id,
            'status_krs' => 'diambil',
            'tanggal_ambil' => now(),
        ]);

        Krs::create([
            'mahasiswa_user_id' => $mahasiswa1->user_id,
            'kelas_id' => $kelasBasdat->kelas_id,
            'status_krs' => 'diambil',
            'tanggal_ambil' => now(),
        ]);

        Krs::create([
            'mahasiswa_user_id' => $mahasiswa2->user_id,
            'kelas_id' => $kelasPemweb->kelas_id,
            'status_krs' => 'diambil',
            'tanggal_ambil' => now(),
        ]);

        $this->command->info('Database seeded successfully!');
    }
}
