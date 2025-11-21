<x-app-layout>
    @section('title', 'Profile Dosen')

    @php
        // Gunakan data dari controller; fallback placeholder jika belum ada di DB.
        $fallback = (object) [
            'user_id' => null,
            'name' => 'JAKA PRATAMA, S.Kom., M.Kom.',
            'nidn' => '0715048607',
            'email' => 'jakapratamma@gmail.com',
            'jenis_kelamin' => 'Belum diatur',
            'program_studi' => 'Belum diatur',
            'fakultas' => 'Belum diatur',
            'alamat' => 'Belum diatur',
            'no_hp' => 'Belum diatur',
            'status' => 'Aktif',
            'jabatan_fungsional' => 'Belum diatur',
            'bidang_keahlian_raw' => 'Bidang Keahlian, Jaringan Komputer',
            'bidang_keahlian_list' => ['Bidang Keahlian', 'Jaringan Komputer'],
        ];

        $d = $lecturer ?? $fallback;
        $bidangList = $d->bidang_keahlian_list
            ?? (isset($d->bidang_keahlian_raw)
                ? array_filter(array_map('trim', explode(',', $d->bidang_keahlian_raw)))
                : []);
    @endphp

    <div class="space-y-6">
        <!-- Header (tanpa search) -->
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white">
            <div class="absolute inset-0 opacity-25"
                 style="background: radial-gradient(circle at 20% 20%, rgba(255,224,94,0.4), transparent 35%), radial-gradient(circle at 80% 30%, rgba(255,224,94,0.25), transparent 30%), radial-gradient(circle at 50% 80%, rgba(255,224,94,0.3), transparent 40%);">
            </div>
            <div id="top" class="relative px-6 py-6 sm:px-8 sm:py-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <p class="text-xs uppercase tracking-[0.25em] text-yellow-200/80 mb-2">Faculty Member</p>
                    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Profile Dosen</h1>
                    <p class="text-slate-200/80 mt-1">Ringkasan identitas dan peran dosen dalam satu tampilan elegan.</p>
                </div>
                <div class="flex items-center gap-3 bg-white/10 backdrop-blur rounded-2xl px-4 py-3 border border-white/10 shadow-lg">
                    <div class="w-12 h-12 rounded-full bg-white/20 grid place-content-center text-xl">{{ strtoupper(substr($d->name,0,1)) }}</div>
                    <div class="leading-tight text-sm">
                        <p class="font-semibold">{{ $d->name }}</p>
                        <p class="text-yellow-200/90">Dosen</p>
                    </div>
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
                                @foreach ($bidangList as $tag)
                                    <span class="px-3 py-1 rounded-full bg-yellow-200/70 text-gray-700 text-xs font-semibold">{{ $tag }}</span>
                                @endforeach
                                @if (empty($bidangList))
                                    <span class="text-xs text-gray-500">Belum diatur</span>
                                @endif
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
                    <a href="{{ route('dosen.profile.edit') }}" class="inline-flex items-center gap-2 text-yellow-600 hover:text-yellow-700 bg-yellow-100 hover:bg-yellow-200 transition px-3 py-2 rounded-lg">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="font-semibold text-sm">Lengkapi / Edit</span>
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
