@php
    $s = $student ?? (object) [];
    $editUrl = \Illuminate\Support\Facades\Route::has('profile.edit') ? route('profile.edit') : url('profile/edit');
@endphp

<div class="grid grid-cols-1 lg:grid-cols-[2fr_3fr] gap-6">
    <!-- Kartu ringkas -->
    <div class="bg-yellow-50 border border-yellow-100 rounded-2xl p-6 shadow-[0_6px_0_#e5e7eb] transition-transform duration-300 transform-gpu hover:scale-[1.01] hover:shadow-[0_10px_0_#e5e7eb]">
        <div class="flex flex-col items-center text-center gap-3">
            <div class="relative">
                <div class="w-24 h-24 rounded-full bg-white border-4 border-yellow-200 grid place-content-center shadow-md">
                    <i class="fa-solid fa-user text-4xl text-gray-300"></i>
                </div>
                <span class="absolute -bottom-2 -right-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full shadow-sm">{{ $s->status ?? 'Aktif' }}</span>
            </div>
            <div>
                <p class="text-xl font-extrabold tracking-wide">{{ $s->name ?? (auth()->user()->name ?? 'JAYNUDIN MALIK') }}</p>
                <p class="text-gray-500">{{ $s->nim ?? '33372400110' }}</p>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-3 mt-2">
                <span class="px-3 py-1 rounded-lg bg-yellow-200 text-gray-700 text-sm font-semibold">{{ $s->prodi ?? 'Informatika' }}</span>
                <span class="px-3 py-1 rounded-lg bg-yellow-200 text-gray-700 text-sm font-semibold">{{ $s->angkatan ?? '2024' }}</span>
            </div>
            <div class="text-sm text-gray-600 mt-4">
                <p class="font-semibold">DOSEN PEMBIMBING</p>
                <p>{{ $s->dosen_pembimbing ?? 'Mohamad Hilman, S.Kom., M.T.I' }}</p>
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
                <div class="text-gray-700">{{ $s->nim ?? '3337240110' }}</div>
            </div>
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-transform duration-200 transform-gpu hover:scale-[1.01]">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-hashtag text-yellow-500"></i><span>NIK</span></div>
                <div class="text-gray-700">{{ $s->nik ?? '3671234567890001' }}</div>
            </div>
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-transform duration-200 transform-gpu hover:scale-[1.01]">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-envelope text-yellow-500"></i><span>Email</span></div>
                <div class="text-gray-700 break-all">{{ $s->email ?? 'jaynudin02@gmail.com' }}</div>
            </div>
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-transform duration-200 transform-gpu hover:scale-[1.01]">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-moon text-yellow-500"></i><span>Agama</span></div>
                <div class="text-gray-700">{{ $s->agama ?? 'Islam' }}</div>
            </div>
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-transform duration-200 transform-gpu hover:scale-[1.01]">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-venus-mars text-yellow-500"></i><span>Jenis Kelamin</span></div>
                <div class="text-gray-700">{{ $s->jenis_kelamin ?? 'Laki-laki' }}</div>
            </div>
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-transform duration-200 transform-gpu hover:scale-[1.01]">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-cake-candles text-yellow-500"></i><span>TTL</span></div>
                <div class="text-gray-700">{{ $s->ttl ?? 'Jakarta, 20 April 2002' }}</div>
            </div>
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40 transition-transform duration-200 transform-gpu hover:scale-[1.01]">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-location-dot text-yellow-500"></i><span>Alamat</span></div>
                <div class="text-gray-700">{{ $s->alamat ?? 'Jalan Kemang Raya, RT 11 RW 2, Jakarta Selatan' }}</div>
            </div>
            <div class="grid grid-cols-[8.5rem_1fr] gap-2 items-start p-2 rounded-lg hover:bg-yellow-50/40">
                <div class="font-semibold flex items-center gap-2"><i class="fa-solid fa-phone text-yellow-500"></i><span>No HP</span></div>
                <div class="text-gray-700">{{ $s->no_hp ?? '08777778888' }}</div>
            </div>
        </div>
    </div>
</div>
