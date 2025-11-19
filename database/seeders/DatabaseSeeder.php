<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\DosenDetail;
use App\Models\MahasiswaDetail;
use App\Models\MataKuliah;
use App\Models\Kelas;
use App\Models\Krs;
use App\Models\JenisSurat;
use App\Models\PengajuanSurat;
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
            'semester' => '5',
            'prodi' => 'Informatika',
            'deskripsi' => 'Mata kuliah yang mempelajari tentang pemrograman web',
        ]);

        $mkEcommerce = MataKuliah::create([
            'kode_mk' => 'RIK42113',
            'nama_mk' => 'E-Commerce',
            'sks' => 3,
            'semester' => '5',
            'prodi' => 'Informatika',
            'deskripsi' => 'Mata kuliah yang mempelajari tentang e-commerce',
        ]);

        $mkBasdat = MataKuliah::create([
            'kode_mk' => 'RIK42207',
            'nama_mk' => 'Sistem Basis Data',
            'sks' => 3,
            'semester' => '3',
            'prodi' => 'Informatika',
            'deskripsi' => 'Mata kuliah yang mempelajari tentang basis data',
        ]);

        $mkSisop = MataKuliah::create([
            'kode_mk' => 'RIK42203',
            'nama_mk' => 'Sistem Operasi',
            'sks' => 3,
            'semester' => '5',
            'prodi' => 'Informatika',
            'deskripsi' => 'Mata kuliah yang mempelajari tentang sistem operasi',
        ]);

        $mkIot = MataKuliah::create([
            'kode_mk' => 'RIK42208',
            'nama_mk' => 'Internet of Things',
            'sks' => 3,
            'semester' => '5',
            'prodi' => 'Informatika',
            'deskripsi' => 'Mata kuliah yang mempelajari tentang IoT',
        ]);

        // Create Kelas
        $kelasPemweb = Kelas::create([
            'mk_id' => $mkPemweb->mk_id,
            'dosen_pengampu_id' => $dosen1->user_id,
            'nama_kelas' => 'C-24',
            'tahun_ajar' => '2024/2025',
            'semester' => 'ganjil',
            'kapasitas' => 40,
            'jam_mulai' => '10:00:00',
            'jam_selesai' => '12:00:00',
            'hari' => 'Rabu',
        ]);

        $kelasEcommerce = Kelas::create([
            'mk_id' => $mkEcommerce->mk_id,
            'dosen_pengampu_id' => $dosen2->user_id,
            'nama_kelas' => 'A-24',
            'tahun_ajar' => '2024/2025',
            'semester' => 'ganjil',
            'kapasitas' => 40,
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '10:00:00',
            'hari' => 'Jumat',
        ]);

        $kelasBasdat = Kelas::create([
            'mk_id' => $mkBasdat->mk_id,
            'dosen_pengampu_id' => $dosen3->user_id,
            'nama_kelas' => 'B-24',
            'tahun_ajar' => '2024/2025',
            'semester' => 'ganjil',
            'kapasitas' => 40,
            'jam_mulai' => '13:00:00',
            'jam_selesai' => '15:00:00',
            'hari' => 'Senin',
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

        // Create Jenis Surat
        $jsAktif = JenisSurat::create([
            'nama_surat' => 'Surat Keterangan Aktif Kuliah',
            'persyaratan' => 'KTM aktif, Bukti pembayaran UKT semester berjalan',
            'estimasi_hari' => 3,
        ]);

        $jsMagang = JenisSurat::create([
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

        // Sample Pengajuan Surat
        PengajuanSurat::create([
            'mahasiswa_user_id' => $mahasiswa1->user_id,
            'jenis_surat_id' => $jsAktif->jenis_surat_id,
            'dosen_pa_id' => $dosen3->user_id,
            'status_pengajuan' => 'menunggu',
            'keperluan' => 'Untuk keperluan administrasi beasiswa internal kampus.',
            'tanggal_keperluan' => now()->addDays(7),
        ]);

        PengajuanSurat::create([
            'mahasiswa_user_id' => $mahasiswa2->user_id,
            'jenis_surat_id' => $jsMagang->jenis_surat_id,
            'dosen_pa_id' => $dosen1->user_id,
            'status_pengajuan' => 'menunggu',
            'keperluan' => 'Pengantar permohonan magang di PT Maju Jaya.',
            'tanggal_keperluan' => now()->addDays(14),
        ]);

        $this->command->info('Database seeded successfully!');
    }
}
