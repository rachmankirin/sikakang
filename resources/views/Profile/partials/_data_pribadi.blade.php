@php
    $s = $student ?? (object) [];
    $editUrl = \Illuminate\Support\Facades\Route::has('mahasiswa.profile.edit') ? route('mahasiswa.profile.edit') : url('profile/mahasiswa/edit');
@endphp

<div class="grid grid-cols-1 lg:grid-cols-[2fr_3fr] gap-6">
    <!-- Kartu ringkas -->
    <div class="relative overflow-hidden rounded-2xl p-6 bg-gradient-to-br from-yellow-50 via-white to-yellow-100 border border-yellow-100 shadow-sm">
        <div class="absolute inset-0 opacity-30"
             style="background: radial-gradient(circle at 20% 20%, rgba(255,224,94,0.25), transparent 35%), radial-gradient(circle at 80% 40%, rgba(255,224,94,0.15), transparent 30%);"></div>
        <div class="relative flex flex-col items-center text-center gap-3">
            <div class="relative">
                <div class="w-24 h-24 rounded-2xl bg-white border-4 border-yellow-200 grid place-content-center shadow-md">
                    <i class="fa-solid fa-user text-4xl text-gray-300"></i>
                </div>
                <span class="absolute -bottom-2 -right-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full shadow-sm">
                    {{ $s->status ?? 'Aktif' }}
                </span>
            </div>
            <div>
                <p class="text-xl font-extrabold tracking-wide text-gray-900">{{ $s->name ?? (auth()->user()->name ?? 'Mahasiswa') }}</p>
                <p class="text-gray-600">{{ $s->nim ?? '-' }}</p>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-2 mt-2">
                <span class="px-3 py-1 rounded-lg bg-yellow-200 text-gray-800 text-sm font-semibold">{{ $s->prodi ?? '-' }}</span>
                <span class="px-3 py-1 rounded-lg bg-yellow-200 text-gray-800 text-sm font-semibold">{{ $s->angkatan ?? '-' }}</span>
            </div>
            <div class="text-sm text-gray-600 mt-4">
                <p class="font-semibold uppercase tracking-wide text-xs text-gray-500">Dosen Pembimbing</p>
                <p class="text-gray-800">{{ $s->dosen_pembimbing ?? 'Belum diatur' }}</p>
            </div>
        </div>
    </div>

    <!-- Detail lengkap -->
    <div class="bg-white border border-yellow-100 rounded-2xl p-6 shadow-sm transition-transform duration-300 transform-gpu hover:scale-[1.01] hover:shadow-md">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg sm:text-xl font-extrabold">Detail Mahasiswa</h2>
            <a href="{{ $editUrl }}" class="inline-flex items-center gap-2 text-yellow-600 hover:text-yellow-700 bg-yellow-100 hover:bg-yellow-200 transition px-3 py-2 rounded-lg">
                <i class="fa-solid fa-pen-to-square"></i>
                <span class="font-semibold text-sm">Edit</span>
            </a>
        </div>

        <!--
            Layout:
            - Mobile: 1 kolom, tiap item vertikal -> rapi
            - Desktop: 2 kolom, item tertentu dibuat full width (lg:col-span-2)
        -->
        <div class="space-y-3 text-sm">
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-transform duration-200 transform-gpu hover:scale-[1.01]">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-id-card text-yellow-500"></i><span>NIM</span></div>
                <div class="text-gray-700">{{ $s->nim ?? '-' }}</div>
            </div>
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-transform duration-200 transform-gpu hover:scale-[1.01]">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-hashtag text-yellow-500"></i><span>NIK</span></div>
                <div class="text-gray-700">{{ $s->nik ?? '-' }}</div>
            </div>
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-transform duration-200 transform-gpu hover:scale-[1.01]">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-envelope text-yellow-500"></i><span>Email</span></div>
                <div class="text-gray-700 break-all">{{ $s->email ?? '-' }}</div>
            </div>
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-transform duration-200 transform-gpu hover:scale-[1.01]">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-moon text-yellow-500"></i><span>Agama</span></div>
                <div class="text-gray-700">{{ $s->agama ?? 'Belum diatur' }}</div>
            </div>
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-transform duration-200 transform-gpu hover:scale-[1.01]">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-venus-mars text-yellow-500"></i><span>Jenis Kelamin</span></div>
                <div class="text-gray-700">{{ $s->jenis_kelamin ?? 'Belum diatur' }}</div>
            </div>
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-transform duration-200 transform-gpu hover:scale-[1.01]">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-cake-candles text-yellow-500"></i><span>TTL</span></div>
                <div class="text-gray-700">{{ $s->ttl ?? 'Belum diatur' }}</div>
            </div>
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-transform duration-200 transform-gpu hover:scale-[1.01]">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-location-dot text-yellow-500"></i><span>Alamat</span></div>
                <div class="text-gray-700">{{ $s->alamat ?? 'Belum diatur' }}</div>
            </div>
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-phone text-yellow-500"></i><span>No HP</span></div>
                <div class="text-gray-700">{{ $s->no_hp ?? 'Belum diatur' }}</div>
            </div>
        </div>
    </div>
</div>
