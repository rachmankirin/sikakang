<x-app-layout>
    @section('title', 'Profile Dosen')

    @php
        // Agar mudah dihubungkan ke data nyata: cukup kirim $lecturer berbentuk object/array berikut.
        $d = $lecturer ?? (object) [
            'name' => 'JAKA PRATAMA, S.Kom., M.Kom.',
            'nidn' => '0715048607',
            'email' => 'jakapratamma@gmail.com',
            'jenis_kelamin' => 'Laki-laki',
            'program_studi' => 'Informatika',
            'fakultas' => 'Fakultas Teknik',
            'alamat' => 'Jalan Raya Cilegon KM. 3, Kota Serang, Banten',
            'no_hp' => '08777778888',
            'status' => 'Aktif',
            'bidang_keahlian' => ['Bidang Keahlian', 'Jaringan Komputer'],
            'jabatan_fungsional' => 'Rektor',
        ];
    @endphp

    <div class="space-y-6">
        <!-- Header (tanpa search) -->
        <div class="flex items-center justify-between">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-800 tracking-tight">Profile Dosen</h1>
            <div class="hidden sm:flex items-center gap-2">
                <img src="{{ url('images/profile.svg') }}" class="w-8 h-8 rounded-full" alt="profile" />
                <div class="leading-tight text-sm">
                    <p class="font-semibold">{{ $d->name }}</p>
                    <p class="text-gray-500">Dosen</p>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="grid grid-cols-1 lg:grid-cols-[2fr_3fr] gap-6">
            <!-- Kartu ringkas -->
            <div class="bg-yellow-50 border border-yellow-100 rounded-2xl p-6 shadow-[0_6px_0_#e5e7eb]">
                <div class="flex flex-col items-center text-center gap-3">
                    <div class="w-24 h-24 rounded-full bg-white border-4 border-yellow-200 grid place-content-center shadow-md">
                        <i class="fa-solid fa-user text-4xl text-gray-300"></i>
                    </div>
                    <div>
                        <p class="text-xl font-extrabold tracking-wide">{{ $d->name }}</p>
                        <p class="text-gray-500">{{ $d->nidn }}</p>
                    </div>
                    <div class="text-xs text-gray-600 mt-2 flex items-center gap-2">
                        <span>Status</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-100 text-green-700 font-semibold">{{ $d->status }}</span>
                    </div>

                    <div class="w-full mt-4 text-left space-y-4">
                        <div>
                            <div class="flex items-center gap-2 text-sm font-semibold text-gray-700">
                                <i class="fa-solid fa-flask text-yellow-500"></i>
                                Bidang Keahlian
                            </div>
                            <div class="mt-2 flex flex-wrap gap-2">
                                @foreach (($d->bidang_keahlian ?? []) as $tag)
                                    <span class="px-3 py-1 rounded-full bg-yellow-200/70 text-gray-700 text-xs font-semibold">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>
                        @if (!empty($d->jabatan_fungsional))
                        <div>
                            <div class="flex items-center gap-2 text-sm font-semibold text-gray-700">
                                <i class="fa-solid fa-briefcase text-yellow-500"></i>
                                Jabatan Fungsional
                            </div>
                            <div class="mt-2">
                                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-yellow-200/70 text-gray-700 text-sm font-semibold">
                                    <i class="fa-solid fa-user-tie"></i> {{ $d->jabatan_fungsional }}
                                </span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Detail Dosen -->
            <div class="bg-white border border-yellow-100 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg sm:text-xl font-extrabold">Detail Dosen</h2>
                    @php
                        $editTargetId = $d->id ?? $d->user_id ?? null;
                        $editUrl = $editTargetId && Route::has('dosen.edit')
                            ? route('dosen.edit', ['dosen' => $editTargetId])
                            : '#';
                    @endphp
                    <a href="{{ $editUrl }}" class="inline-flex items-center gap-2 text-yellow-600 hover:text-yellow-700 bg-yellow-100 hover:bg-yellow-200 transition px-3 py-2 rounded-lg">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="font-semibold text-sm">Edit</span>
                    </a>
                </div>

                <div class="space-y-3 text-sm">
                    <div class="grid grid-cols-[9rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-colors duration-150">
                        <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-id-card text-yellow-500"></i><span>NIDN</span></div>
                        <div class="text-gray-700">{{ $d->nidn }}</div>
                    </div>
                    <div class="grid grid-cols-[9rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-colors duration-150">
                        <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-envelope text-yellow-500"></i><span>Email</span></div>
                        <div class="text-gray-700 break-all">{{ $d->email }}</div>
                    </div>
                    <div class="grid grid-cols-[9rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-colors duration-150">
                        <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-venus-mars text-yellow-500"></i><span>Jenis Kelamin</span></div>
                        <div class="text-gray-700">{{ $d->jenis_kelamin }}</div>
                    </div>
                    <div class="grid grid-cols-[9rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-colors duration-150">
                        <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-book text-yellow-500"></i><span>Program Studi</span></div>
                        <div class="text-gray-700">{{ $d->program_studi }}</div>
                    </div>
                    <div class="grid grid-cols-[9rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-colors duration-150">
                        <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-building-columns text-yellow-500"></i><span>Fakultas</span></div>
                        <div class="text-gray-700">{{ $d->fakultas }}</div>
                    </div>
                    <div class="grid grid-cols-[9rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-colors duration-150">
                        <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-location-dot text-yellow-500"></i><span>Alamat</span></div>
                        <div class="text-gray-700">{{ $d->alamat }}</div>
                    </div>
                    <div class="grid grid-cols-[9rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-colors duration-150">
                        <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-phone text-yellow-500"></i><span>No Handphone</span></div>
                        <div class="text-gray-700">{{ $d->no_hp }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
