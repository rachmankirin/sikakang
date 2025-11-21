<x-app-layout>
    @section('title', 'Edit Profil Mahasiswa')

    @php
        $s = $student ?? (object)[
            'name' => '',
            'email' => '',
            'nim' => '',
            'nik' => '',
            'agama' => '',
            'jenis_kelamin' => '',
            'tempat_lahir' => '',
            'tanggal_lahir' => '',
            'alamat' => '',
            'no_hp' => '',
            'angkatan' => '',
            'prodi' => '',
            'fakultas' => '',
            'status' => '',
            'dosen_pembimbing' => '',
        ];
    @endphp

    <div class="space-y-6">
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-yellow-50 via-white to-yellow-100 border border-yellow-100">
            <div class="absolute inset-0 opacity-25"
                 style="background: radial-gradient(circle at 20% 30%, rgba(255,224,94,0.4), transparent 35%), radial-gradient(circle at 80% 40%, rgba(255,224,94,0.25), transparent 30%);"></div>
            <div class="relative px-6 py-6 sm:px-8 sm:py-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <p class="text-xs uppercase tracking-[0.25em] text-yellow-700/70 mb-2">Edit Profil</p>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">Edit Profil Mahasiswa</h1>
                    <p class="text-gray-600 mt-1">Bidang NIM & Email tidak dapat diubah oleh mahasiswa.</p>
                </div>
                <a href="{{ route('mahasiswa.profile', ['tab' => 'data']) }}"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/80 text-gray-800 border border-yellow-200 hover:bg-white transition shadow-sm">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali ke Profil
                </a>
            </div>
        </div>

        <form action="{{ route('mahasiswa.profile.update') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-[1.1fr_0.9fr] gap-6">
            @csrf
            <input type="hidden" name="tab" value="data">
            <div class="bg-white rounded-2xl shadow-lg border border-yellow-100 overflow-hidden">
                <div class="bg-gradient-to-r from-yellow-400 to-amber-300 px-5 py-4 flex items-center gap-3 text-gray-900">
                    <i class="fa-solid fa-id-card"></i>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide">Data Utama</p>
                        <p class="text-sm">Identitas pokok mahasiswa</p>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $s->name) }}" required
                                   class="w-full rounded-xl border border-yellow-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-700">Email (Tidak dapat diubah)</label>
                            <input type="email" value="{{ $s->email }}" disabled
                                   class="w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-gray-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-700">NIM (Tidak dapat diubah)</label>
                            <input type="text" value="{{ $s->nim }}" disabled
                                   class="w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2 text-gray-500">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-700">NIK</label>
                            <input type="text" name="nik" value="{{ old('nik', $s->nik) }}"
                                   class="w-full rounded-xl border border-yellow-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400" maxlength="20">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-700">Agama</label>
                            <select name="agama" class="w-full rounded-xl border border-yellow-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400">
                                @php $agamas = ['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu','Lainnya']; @endphp
                                <option value="">Pilih Agama</option>
                                @foreach($agamas as $opt)
                                    <option value="{{ $opt }}" {{ old('agama', $s->agama) === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-700">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="w-full rounded-xl border border-yellow-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400">
                                @php $genders = ['Laki-laki','Perempuan','Lainnya']; @endphp
                                <option value="">Pilih Jenis Kelamin</option>
                                @foreach($genders as $g)
                                    <option value="{{ $g }}" {{ old('jenis_kelamin', $s->jenis_kelamin) === $g ? 'selected' : '' }}>{{ $g }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-700">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $s->tempat_lahir) }}"
                                   class="w-full rounded-xl border border-yellow-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400">
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $s->tanggal_lahir) }}"
                                   class="w-full rounded-xl border border-yellow-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400">
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-lg border border-yellow-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-slate-900 to-slate-800 px-5 py-4 text-white flex items-center gap-3">
                        <i class="fa-solid fa-map-location-dot text-yellow-300"></i>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-yellow-200/90">Kontak & Alamat</p>
                            <p class="text-sm text-slate-100">Informasi tempat tinggal & nomor HP</p>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-700">Alamat</label>
                            <textarea name="alamat" rows="2" class="w-full rounded-xl border border-yellow-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400" placeholder="Tuliskan alamat lengkap">{{ old('alamat', $s->alamat) }}</textarea>
                        </div>
                        <div class="space-y-1">
                            <label class="text-sm font-semibold text-gray-700">No Handphone</label>
                            <input type="text" name="no_hp" value="{{ old('no_hp', $s->no_hp) }}"
                                   class="w-full rounded-xl border border-yellow-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400" placeholder="08xxxx">
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg border border-yellow-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-yellow-400 to-amber-300 px-5 py-4 text-gray-900 flex items-center gap-3">
                        <i class="fa-solid fa-lock"></i>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide">Informasi Terkunci</p>
                            <p class="text-sm">Hanya admin yang dapat mengubah data berikut</p>
                        </div>
                    </div>
                    <div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-gray-500">Program Studi</p>
                            <p class="font-semibold text-gray-800">{{ $s->prodi ?: 'Belum diatur' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Fakultas</p>
                            <p class="font-semibold text-gray-800">{{ $s->fakultas ?: 'Belum diatur' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Angkatan</p>
                            <p class="font-semibold text-gray-800">{{ $s->angkatan ?: 'Belum diatur' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Status Mahasiswa</p>
                            <p class="font-semibold text-gray-800">{{ $s->status ?: 'Belum diatur' }}</p>
                        </div>
                        <div class="sm:col-span-2">
                            <p class="text-gray-500">Dosen Pembimbing</p>
                            <p class="font-semibold text-gray-800">{{ $s->dosen_pembimbing ?: 'Belum diatur' }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3 justify-end">
                    <a href="{{ route('mahasiswa.profile', ['tab' => 'data']) }}"
                       class="px-4 py-2 rounded-lg bg-gray-100 text-gray-800 hover:bg-gray-200 transition">Batal</a>
                    <button type="submit"
                        class="px-5 py-2 rounded-lg bg-gradient-to-r from-yellow-400 to-amber-400 text-gray-900 font-semibold shadow-sm hover:brightness-110 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
