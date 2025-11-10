<x-app-layout>
    @section('title', 'Edit Biodata Mahasiswa')

    @php
        // Opsi enum sederhana untuk kemudahan backend (tinggal ambil dari config jika perlu)
        $opsiAgama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'];
        $opsiKelamin = ['Laki-laki', 'Perempuan'];
        $opsiStatusKawin = ['Belum Menikah', 'Menikah', 'Cerai'];
        $opsiGolDar = ['A', 'B', 'AB', 'O', 'Tidak Tahu'];
    @endphp

    <div x-data="{ showToast: false }" x-init="@json(session('success') ? true : false) ? (showToast=true, setTimeout(() => showToast=false, 2000)) : null" class="space-y-6">

        <!-- Toast sukses -->
        <div x-show="showToast" x-transition.origin.top.duration.300ms
             class="fixed top-3 left-1/2 -translate-x-1/2 z-50 bg-green-500 text-white px-4 py-2 rounded-full shadow-md">
            <i class="fa-solid fa-circle-check mr-2"></i> Data sudah diperbarui
        </div>

        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-800 tracking-tight">Biodata Mahasiswa</h1>
                <p class="text-gray-500 mt-1">Form Edit Biodata Mahasiswa</p>
            </div>
            <a href="{{ url('/profile/mahasiswa?tab=data') }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 transition">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>

        <form action="{{ route('profile.update') }}" method="POST" x-data="{ saving: false }" @submit="saving=true">
            @csrf
            <div class="grid grid-cols-1 gap-6">

                <!-- Informasi Pribadi -->
                <div class="rounded-2xl border border-yellow-200 bg-white shadow-sm overflow-hidden transition-transform duration-300 transform-gpu hover:scale-[1.005]">
                    <div class="bg-yellow-100/60 px-5 py-3 font-bold flex items-center gap-2">
                        <i class="fa-solid fa-user text-yellow-600"></i>
                        Informasi Pribadi
                    </div>
                    <div class="p-5 grid grid-cols-1 md:grid-cols-[220px_1fr] gap-4">
                        <label class="md:text-right md:pr-3 py-2 font-semibold">Agama<span class="text-red-500">*</span></label>
                        <select name="agama" class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400">
                            <option value="">-- Pilih Agama --</option>
                            @foreach ($opsiAgama as $opt)
                                <option value="{{ $opt }}" {{ old('agama', $student->agama ?? '') === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                            @endforeach
                        </select>

                        <label class="md:text-right md:pr-3 py-2 font-semibold">Jenis Kelamin<span class="text-red-500">*</span></label>
                        <select name="jenis_kelamin" class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            @foreach ($opsiKelamin as $opt)
                                <option value="{{ $opt }}" {{ old('jenis_kelamin', $student->jenis_kelamin ?? '') === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                            @endforeach
                        </select>

                        <label class="md:text-right md:pr-3 py-2 font-semibold">Status Kawin</label>
                        <select name="status_kawin" class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400">
                            <option value="">-- Pilih Status Perkawinan --</option>
                            @foreach ($opsiStatusKawin as $opt)
                                <option value="{{ $opt }}" {{ old('status_kawin', $student->status_kawin ?? '') === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                            @endforeach
                        </select>

                        <label class="md:text-right md:pr-3 py-2 font-semibold">Golongan Darah</label>
                        <select name="golongan_darah" class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400">
                            <option value="">-- Pilih Golongan Darah --</option>
                            @foreach ($opsiGolDar as $opt)
                                <option value="{{ $opt }}" {{ old('golongan_darah', $student->golongan_darah ?? '') === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                            @endforeach
                        </select>

                        <label class="md:text-right md:pr-3 py-2 font-semibold">Tempat Lahir<span class="text-red-500">*</span></label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $student->tempat_lahir ?? '') }}" placeholder="Masukkan Tempat Lahir..."
                               class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400" />

                        <label class="md:text-right md:pr-3 py-2 font-semibold">Tanggal Lahir<span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', isset($student->tanggal_lahir) ? \Illuminate\Support\Carbon::parse($student->tanggal_lahir)->format('Y-m-d') : '') }}"
                               class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400" />
                    </div>
                </div>

                <!-- Alamat -->
                <div class="rounded-2xl border border-yellow-200 bg-white shadow-sm overflow-hidden transition-transform duration-300 transform-gpu hover:scale-[1.005]">
                    <div class="bg-yellow-100/60 px-5 py-3 font-bold flex items-center gap-2">
                        <i class="fa-solid fa-location-dot text-yellow-600"></i>
                        Alamat
                    </div>
                    <div class="p-5 grid grid-cols-1 md:grid-cols-[220px_1fr] gap-4">
                        <label class="md:text-right md:pr-3 py-2 font-semibold">Alamat</label>
                        <textarea name="alamat" rows="2" placeholder="Masukkan Alamat..." class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400">{{ old('alamat', $student->alamat ?? '') }}</textarea>

                        <label class="md:text-right md:pr-3 py-2 font-semibold">RT</label>
                        <input type="text" name="rt" value="{{ old('rt', $student->rt ?? '') }}" placeholder="Masukkan RT..." class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400" />

                        <label class="md:text-right md:pr-3 py-2 font-semibold">RW</label>
                        <input type="text" name="rw" value="{{ old('rw', $student->rw ?? '') }}" placeholder="Masukkan RW..." class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400" />

                        <label class="md:text-right md:pr-3 py-2 font-semibold">Jalan</label>
                        <input type="text" name="jalan" value="{{ old('jalan', $student->jalan ?? '') }}" placeholder="Masukkan Jalan..." class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400" />

                        <!-- Catatan: Provinsi/Kota/Kecamatan/Kelurahan sebagai ENUM kurang efektif mengingat jumlahnya sangat banyak. 
                             Disarankan gunakan dataset/endpoint wilayah atau autocomplete. Sementara, gunakan isian bebas. -->
                        <label class="md:text-right md:pr-3 py-2 font-semibold">Provinsi</label>
                        <input type="text" name="provinsi" value="{{ old('provinsi', $student->provinsi ?? '') }}" placeholder="Masukkan Provinsi..." class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400" />

                        <label class="md:text-right md:pr-3 py-2 font-semibold">Kabupaten/Kota</label>
                        <input type="text" name="kabkota" value="{{ old('kabkota', $student->kabkota ?? '') }}" placeholder="Masukkan Kabupaten/Kota..." class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400" />

                        <label class="md:text-right md:pr-3 py-2 font-semibold">Kecamatan</label>
                        <input type="text" name="kecamatan" value="{{ old('kecamatan', $student->kecamatan ?? '') }}" placeholder="Masukkan Kecamatan..." class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400" />

                        <label class="md:text-right md:pr-3 py-2 font-semibold">Kelurahan</label>
                        <input type="text" name="kelurahan" value="{{ old('kelurahan', $student->kelurahan ?? '') }}" placeholder="Masukkan Kelurahan..." class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400" />

                        <label class="md:text-right md:pr-3 py-2 font-semibold">Negara</label>
                        <input type="text" name="negara" value="{{ old('negara', $student->negara ?? 'Indonesia') }}" placeholder="Masukkan Negara..." class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400" />

                        <label class="md:text-right md:pr-3 py-2 font-semibold">Kode Pos</label>
                        <input type="text" name="kode_pos" value="{{ old('kode_pos', $student->kode_pos ?? '') }}" placeholder="Masukkan Kode Pos..." class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400" />
                    </div>
                </div>

                <!-- Kontak -->
                <div class="rounded-2xl border border-yellow-200 bg-white shadow-sm overflow-hidden transition-transform duration-300 transform-gpu hover:scale-[1.005]">
                    <div class="bg-yellow-100/60 px-5 py-3 font-bold flex items-center gap-2">
                        <i class="fa-solid fa-phone text-yellow-600"></i>
                        Kontak
                    </div>
                    <div class="p-5 grid grid-cols-1 md:grid-cols-[220px_1fr] gap-4">
                        <label class="md:text-right md:pr-3 py-2 font-semibold">E-mail<span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email', $student->email ?? '') }}" placeholder="Masukkan E-mail..." class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400" />

                        <label class="md:text-right md:pr-3 py-2 font-semibold">No Handphone</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $student->no_hp ?? '') }}" placeholder="Masukkan No Handphone..." class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400" />

                        <label class="md:text-right md:pr-3 py-2 font-semibold">No Rumah</label>
                        <input type="text" name="no_rumah" value="{{ old('no_rumah', $student->no_rumah ?? '') }}" placeholder="Masukkan No Rumah..." class="w-full rounded-xl border border-yellow-300 focus:ring-yellow-400 focus:border-yellow-400" />
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3 justify-end">
                    <a href="{{ url('/profile/mahasiswa?tab=data') }}" class="px-5 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 transition">Batal</a>
                    <button type="submit" class="px-5 py-2 rounded-lg bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold shadow-sm transition flex items-center gap-2" :class="saving ? 'opacity-75 cursor-not-allowed' : ''">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
