<x-app-layout>

@section('content')
<div class="bg-white min-h-screen p-4 sm:p-6 lg:p-8">
    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Selamat Datang !</h1>
            <p class="text-gray-600 mt-1">Berikut adalah ringkasan aktivitas mengajar Anda.</p>
        </div>

        <!-- Stat Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-md flex items-center space-x-4">
                <div class="bg-[#feffc4] p-3 rounded-full">
                    {{-- Ganti dengan ikon yang sesuai, contoh: Heroicons --}}
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Jumlah Kelas</p>
                    <p class="text-2xl font-bold text-gray-900">4</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md flex items-center space-x-4">
                <div class="bg-[#feffc4] p-3 rounded-full">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Mahasiswa</p>
                    <p class="text-2xl font-bold text-gray-900">120</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md flex items-center space-x-4">
                <div class="bg-[#feffc4] p-3 rounded-full">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tugas Perlu Dinilai</p>
                    <p class="text-2xl font-bold text-gray-900">3</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md flex items-center space-x-4">
                <div class="bg-[#feffc4] p-3 rounded-full">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Angkatan</p>
                    <p class="text-2xl font-bold text-gray-900">4</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Daftar Kelas -->
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Kelas yang Diampu</h2>
                <div class="space-y-4">
                    {{-- Loop untuk setiap kelas --}}
                    @for ($i = 0; $i < 3; $i++)
                    <div class="border border-gray-200 rounded-lg p-4 flex flex-col sm:flex-row justify-between items-start sm:items-center hover:bg-[#feffc4] transition">
                        <div>
                            <p class="font-semibold text-black">Basis Data Lanjut - A</p>
                            <p class="text-sm text-gray-500">Senin, 10:00 - 12:00 | 40 Mahasiswa</p>
                        </div>
                        <a href="#" class="mt-3 sm:mt-0 inline-block bg-[#feffc4] text-black text-sm font-semibold px-4 py-2 rounded-lg hover:bg-yellow-300 border border-yellow-400">
                            Lihat Detail
                        </a>
                    </div>
                    @endfor
                    {{-- Akhir Loop --}}
                </div>
            </div>

            <!-- Jadwal & Pengumuman -->
            <div class="space-y-8">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Jadwal Hari Ini</h2>
                    <ul class="space-y-3">
                        <li class="flex items-start space-x-3">
                            <div class="bg-[#feffc4] text-black text-sm font-bold rounded-md px-2 py-1 border border-yellow-400">10:00</div>
                            <div>
                                <p class="font-semibold text-gray-700">Basis Data Lanjut - A</p>
                                <p class="text-sm text-gray-500">Ruang 3.1.1</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3">
                            <div class="bg-[#feffc4] text-black text-sm font-bold rounded-md px-2 py-1 border border-yellow-400">13:00</div>
                            <div>
                                <p class="font-semibold text-gray-700">Pemrograman Web - B</p>
                                <p class="text-sm text-gray-500">Ruang 3.1.2</p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</div>
</x-app-layout>