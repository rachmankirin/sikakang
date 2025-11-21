<x-app-layout>
    @section('title', 'Edit Profil Dosen')

    @php
        $d = $lecturer ?? (object)[
            'name' => '',
            'email' => '',
            'nidn' => '',
            'jabatan_fungsional' => '',
            'bidang_keahlian_raw' => '',
            'jenis_kelamin' => '',
            'program_studi' => '',
            'fakultas' => '',
            'alamat' => '',
            'no_hp' => '',
        ];
    @endphp

    <div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white rounded-3xl shadow-xl">
        <div class="absolute inset-0 opacity-30"
             style="background: radial-gradient(circle at 20% 20%, rgba(255,224,94,0.35), transparent 35%), radial-gradient(circle at 80% 30%, rgba(255,224,94,0.2), transparent 30%), radial-gradient(circle at 60% 80%, rgba(255,224,94,0.25), transparent 35%);">
        </div>
        <div class="relative p-6 sm:p-8">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-xs uppercase tracking-[0.2em] text-yellow-300/80 mb-2">Identitas</p>
                    <h1 class="text-2xl sm:text-3xl font-bold">Perbarui Profil Dosen</h1>
                    <p class="text-slate-200/80 mt-2 max-w-2xl">Pastikan informasi terbaru dicatat dengan rapi. Form ini hanya memuat data yang bisa diubah langsung oleh dosen.</p>
                </div>
                <a href="{{ route('dosen.profile') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 hover:bg-white/20 text-sm font-semibold transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali ke Profil
                </a>
            </div>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 lg:grid-cols-[1.2fr_1fr] gap-6">
        <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-400 to-amber-300 text-slate-900 px-5 py-4 flex items-center gap-3">
                <i class="fa-solid fa-pen-to-square"></i>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide">Form Utama</p>
                    <p class="text-sm">Data dasar akun dosen</p>
                </div>
            </div>
            <form action="{{ route('dosen.profile.update') }}" method="POST" class="p-6 space-y-5">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-slate-700">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $d->name) }}" required
                               class="w-full rounded-xl border border-slate-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400">
                    </div>
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-slate-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $d->email) }}" required
                               class="w-full rounded-xl border border-slate-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-slate-700">NIDN</label>
                        <input type="text" name="nidn" value="{{ old('nidn', $d->nidn) }}"
                               class="w-full rounded-xl border border-slate-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400">
                    </div>
                    <div class="space-y-1">
                        <label class="text-sm font-semibold text-slate-700">Jabatan Fungsional</label>
                        <input type="text" name="jabatan_fungsional" value="{{ old('jabatan_fungsional', $d->jabatan_fungsional) }}"
                               class="w-full rounded-xl border border-slate-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400">
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="text-sm font-semibold text-slate-700">Bidang Keahlian</label>
                    <input type="text" name="bidang_keahlian" value="{{ old('bidang_keahlian', $d->bidang_keahlian_raw) }}"
                           class="w-full rounded-xl border border-slate-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400" placeholder="Pisahkan dengan koma">
                </div>

                <div class="flex justify-end gap-3 pt-2">
                    <a href="{{ route('dosen.profile') }}" class="px-4 py-2 rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 transition">Batal</a>
                    <button type="submit" class="px-4 py-2 rounded-lg bg-gradient-to-r from-yellow-400 to-amber-400 text-slate-900 font-semibold hover:brightness-110 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">
            <div class="bg-gradient-to-r from-slate-900 to-slate-800 text-white px-5 py-4 flex items-center gap-3">
                <i class="fa-solid fa-user-pen text-yellow-300"></i>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-yellow-200/90">Detail Tambahan</p>
                    <p class="text-sm text-slate-100">Lengkapi informasi lain</p>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div class="space-y-1">
                    <label class="text-sm font-semibold text-slate-700">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" value="{{ old('jenis_kelamin', $d->jenis_kelamin) }}"
                           class="w-full rounded-xl border border-slate-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400" placeholder="Belum diatur">
                </div>
                <div class="space-y-1">
                    <label class="text-sm font-semibold text-slate-700">Program Studi</label>
                    <input type="text" name="program_studi" value="{{ old('program_studi', $d->program_studi) }}"
                           class="w-full rounded-xl border border-slate-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400" placeholder="Belum diatur">
                </div>
                <div class="space-y-1">
                    <label class="text-sm font-semibold text-slate-700">Fakultas</label>
                    <input type="text" name="fakultas" value="{{ old('fakultas', $d->fakultas) }}"
                           class="w-full rounded-xl border border-slate-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400" placeholder="Belum diatur">
                </div>
                <div class="space-y-1">
                    <label class="text-sm font-semibold text-slate-700">Alamat</label>
                    <textarea name="alamat" rows="2" class="w-full rounded-xl border border-slate-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400" placeholder="Belum diatur">{{ old('alamat', $d->alamat) }}</textarea>
                </div>
                <div class="space-y-1">
                    <label class="text-sm font-semibold text-slate-700">No Handphone</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $d->no_hp) }}"
                           class="w-full rounded-xl border border-slate-200 px-3 py-2 focus:ring-yellow-400 focus:border-yellow-400" placeholder="Belum diatur">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
