<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\MahasiswaDetail;
use Carbon\Carbon;

class ProfileMahasiswaController extends Controller
{
    /**
     * Tampilkan profil mahasiswa (read-only).
     */
    public function show(Request $request)
    {
        $user = Auth::user()->load('mahasiswaDetail.dosenPa');
        $detail = $user->mahasiswaDetail;

        $student = (object) [
            'user_id' => $user->user_id,
            'name' => $user->nama_lengkap ?? 'Mahasiswa',
            'email' => $user->email ?? '-',
            'nim' => $detail?->nim ?? '-',
            'nik' => $detail?->nik ?? '-',
            'angkatan' => $detail?->angkatan ?? '-',
            'prodi' => $detail?->program_studi ?? '-',
            'fakultas' => $detail?->fakultas ?? '-',
            'status' => $detail?->status_mahasiswa ?? 'Belum diatur',
            'agama' => $detail?->agama ?? 'Belum diatur',
            'jenis_kelamin' => $detail?->jenis_kelamin ?? 'Belum diatur',
            'tempat_lahir' => $detail?->tempat_lahir ?? 'Belum diatur',
            'tanggal_lahir' => $detail?->tanggal_lahir ?? null,
            'alamat' => $detail?->alamat ?? 'Belum diatur',
            'no_hp' => $detail?->no_hp ?? 'Belum diatur',
            'dosen_pembimbing' => $detail?->dosenPa?->nama_lengkap ?? 'Belum diatur',
        ];

        // Format TTL gabungan untuk tampilan
        $student->ttl = $student->tempat_lahir !== 'Belum diatur' && $student->tanggal_lahir
            ? $student->tempat_lahir . ', ' . Carbon::parse($student->tanggal_lahir)->translatedFormat('d F Y')
            : 'Belum diatur';

        $student->tanggal_lahir_form = $detail?->tanggal_lahir
            ? Carbon::parse($detail->tanggal_lahir)->format('Y-m-d')
            : '';

        $active = $request->get('tab', 'data');
        $histories = null;
        $registrations = null;

        return view('Profile.Profile_mahasiswa', compact('student', 'active', 'histories', 'registrations'));
    }

    /**
     * Form edit profil mahasiswa (tanpa mengubah NIM/Email).
     */
    public function edit()
    {
        $user = Auth::user()->load('mahasiswaDetail.dosenPa');
        $detail = $user->mahasiswaDetail;

        $student = (object) [
            'user_id' => $user->user_id,
            'name' => $user->nama_lengkap ?? '',
            'email' => $user->email ?? '',
            'nim' => $detail?->nim ?? '',
            'nik' => $detail?->nik ?? '',
            'angkatan' => $detail?->angkatan ?? '',
            'prodi' => $detail?->program_studi ?? '',
            'fakultas' => $detail?->fakultas ?? '',
            'status' => $detail?->status_mahasiswa ?? '',
            'agama' => $detail?->agama ?? '',
            'jenis_kelamin' => $detail?->jenis_kelamin ?? '',
            'tempat_lahir' => $detail?->tempat_lahir ?? '',
            'tanggal_lahir' => $detail?->tanggal_lahir
                ? \Carbon\Carbon::parse($detail->tanggal_lahir)->format('Y-m-d')
                : '',
            'alamat' => $detail?->alamat ?? '',
            'no_hp' => $detail?->no_hp ?? '',
            'dosen_pembimbing' => $detail?->dosenPa?->nama_lengkap ?? '',
        ];

        return view('Profile.Profile_mahasiswa_edit', compact('student'));
    }

    /**
     * Simpan perubahan profil (tanpa menyentuh NIM / Email).
     */
    public function update(Request $request)
    {
        $user = Auth::user()->load('mahasiswaDetail');
        $detail = $user->mahasiswaDetail;

        $validated = $request->validate([
            'nama_lengkap' => ['required', 'string'],
            'agama' => ['nullable', 'string'],
            'jenis_kelamin' => ['nullable', 'string', Rule::in(['Laki-laki', 'Perempuan', 'Lainnya'])],
            'tempat_lahir' => ['nullable', 'string'],
            'tanggal_lahir' => ['nullable', 'date'],
            'alamat' => ['nullable', 'string'],
            'no_hp' => ['nullable', 'string'],
            'nik' => ['nullable', 'string', 'max:20'],
        ]);

        // Nama boleh diubah (bukan identitas sistem)
        $user->update([
            'nama_lengkap' => $validated['nama_lengkap'],
        ]);

        MahasiswaDetail::updateOrCreate(
            ['user_id' => $user->user_id],
            [
                'nim' => $detail?->nim, // tidak diubah
                'dosen_pa_id' => $detail?->dosen_pa_id,
                'angkatan' => $detail?->angkatan,
                'program_studi' => $detail?->program_studi,
                'fakultas' => $detail?->fakultas,
                'status_mahasiswa' => $detail?->status_mahasiswa,
                'agama' => $validated['agama'] ?? $detail?->agama,
                'jenis_kelamin' => $validated['jenis_kelamin'] ?? $detail?->jenis_kelamin,
                'tempat_lahir' => $validated['tempat_lahir'] ?? $detail?->tempat_lahir,
                'tanggal_lahir' => $validated['tanggal_lahir'] ?? $detail?->tanggal_lahir,
                'alamat' => $validated['alamat'] ?? $detail?->alamat,
                'no_hp' => $validated['no_hp'] ?? $detail?->no_hp,
                'nik' => $validated['nik'] ?? $detail?->nik,
            ]
        );

        return redirect()->route('mahasiswa.profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
