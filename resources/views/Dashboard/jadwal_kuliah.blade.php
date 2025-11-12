<x-app-layout>
<div class="bg-white min-h-screen p-4 sm:p-6 lg:p-8">
    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">Jadwal Kuliah</h1>
            <p class="text-gray-600 mt-2">Semester Ganjil 2024/2025</p>
        </div>

        <!-- Filter & Info -->
        <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center gap-4">
                <select id="filterHari" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                    <option value="all">Semua Hari</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                </select>
            </div>
            <div class="flex items-center gap-2 bg-[#feffc4] px-4 py-2 rounded-lg border border-yellow-400">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium text-gray-700">Total: <strong id="totalMatkul">9</strong> Mata Kuliah</span>
            </div>
        </div>

        <!-- Schedule Cards -->
        <div class="space-y-6">
            
            <!-- Senin -->
            <div class="day-section" data-day="Senin">
                <x-jadwal.day-header day="Senin" />
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <x-jadwal.card 
                        matakuliah="Sistem Basis Data"
                        kode="RIK42207"
                        sks="3"
                        waktu="Senin 10:00 - 12:30 WIB"
                        ruangan="Ruang Kuliah U.205 (ZCU.205i)"
                        dosen="Mohamad Hilman"
                        color="blue">
                        <x-slot name="icon">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                            </svg>
                        </x-slot>
                    </x-jadwal.card>
                </div>
            </div>

            <!-- Selasa -->
            <div class="day-section" data-day="Selasa">
                <x-jadwal.day-header day="Selasa" />
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <x-jadwal.card 
                        matakuliah="Sistem Operasi"
                        kode="RIK42203"
                        sks="3"
                        waktu="Selasa 13:00 - 15:30 WIB"
                        ruangan="Ruang Kuliah RR.302 (ZCL8R.302)"
                        dosen="Indah"
                        color="green">
                        <x-slot name="icon">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </x-slot>
                    </x-jadwal.card>

                    <x-jadwal.card 
                        matakuliah="Internet of Things"
                        kode="RIK42208"
                        sks="3"
                        waktu="Selasa 10:00 - 12:30 WIB"
                        ruangan="Ruang Kuliah RR.302 (ZCL8R.302)"
                        dosen="Andi Jusmadi"
                        color="purple">
                        <x-slot name="icon">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path>
                            </svg>
                        </x-slot>
                    </x-jadwal.card>
                </div>
            </div>

            <!-- Rabu -->
            <div class="day-section" data-day="Rabu">
                <x-jadwal.day-header day="Rabu" />
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <x-jadwal.card 
                        matakuliah="Pengantar Kecerdasan Artificial"
                        kode="RIK42211"
                        sks="3"
                        waktu="Rabu 07:30 - 10:00 WIB"
                        ruangan="Ruang Kuliah CGB.1.304 (ZAC1.3.04)"
                        dosen="Sahriyandi Darmis, Arief Rahmadi"
                        color="orange">
                        <x-slot name="icon">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </x-slot>
                    </x-jadwal.card>

                    <x-jadwal.card 
                        matakuliah="Pemrograman Web"
                        kode="RIK42213"
                        sks="3"
                        waktu="Rabu 10:00 - 12:30 WIB"
                        ruangan="Ruang Lab. Informatika (ZCL11.Lab-H)"
                        dosen="Yulian Arsoli"
                        color="red">
                        <x-slot name="icon">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                            </svg>
                        </x-slot>
                    </x-jadwal.card>
                </div>
            </div>

            <!-- Kamis -->
            <div class="day-section" data-day="Kamis">
                <x-jadwal.day-header day="Kamis" />
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <x-jadwal.card 
                        matakuliah="Bahasa Indonesia"
                        kode="UNI622305"
                        sks="2"
                        waktu="Kamis 07:30 - 09:10 WIB"
                        ruangan="Ruang Virtual (Online)"
                        dosen="Dema Tesniyadi"
                        color="blue">
                        <x-slot name="icon">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </x-slot>
                    </x-jadwal.card>

                    <x-jadwal.card 
                        matakuliah="Desain dan Analisis Algoritma"
                        kode="RIK42201"
                        sks="3"
                        waktu="Kamis 13:00 - 15:30 WIB"
                        ruangan="Ruang Kuliah RR.302 (ZCL8R.302)"
                        dosen="Nurjuang Krisdianto"
                        color="green">
                        <x-slot name="icon">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </x-slot>
                    </x-jadwal.card>
                </div>
            </div>

            <!-- Jumat -->
            <div class="day-section" data-day="Jumat">
                <x-jadwal.day-header day="Jumat" />
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <x-jadwal.card 
                        matakuliah="E-Commerce"
                        kode="RIK42113"
                        sks="3"
                        waktu="Jumat 08:10 - 10:50 WIB"
                        ruangan="Ruang Kuliah U.205 (ZCU.205i)"
                        dosen="Arief Rahmadi"
                        color="purple">
                        <x-slot name="icon">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </x-slot>
                    </x-jadwal.card>

                    <x-jadwal.card 
                        matakuliah="Jaringan Komputer"
                        kode="RIK42206"
                        sks="3"
                        waktu="Jumat 13:00 - 15:30 WIB"
                        ruangan="Ruang Kuliah RR.302 (ZCL8R.302)"
                        dosen="Supriyanto"
                        color="orange">
                        <x-slot name="icon">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                            </svg>
                        </x-slot>
                    </x-jadwal.card>
                </div>
            </div>

        </div>

        <!-- Quick Stats -->
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-4">
            <x-jadwal.stat-card 
                title="Total Mata Kuliah" 
                value="9" 
                color="blue">
                <x-slot name="icon">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </x-slot>
            </x-jadwal.stat-card>

            <x-jadwal.stat-card 
                title="Total SKS" 
                value="26" 
                color="green">
                <x-slot name="icon">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </x-slot>
            </x-jadwal.stat-card>

            <x-jadwal.stat-card 
                title="Jam Perkuliahan" 
                value="48" 
                color="yellow">
                <x-slot name="icon">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </x-slot>
            </x-jadwal.stat-card>
        </div>

    </div>
</div>

<script>
// Filter Hari Functionality
document.getElementById('filterHari').addEventListener('change', function() {
    const selectedDay = this.value;
    const daySections = document.querySelectorAll('.day-section');
    let visibleCount = 0;
    
    daySections.forEach(section => {
        const dayName = section.getAttribute('data-day');
        
        if (selectedDay === 'all') {
            section.style.display = 'block';
            // Count cards in this section
            const cards = section.querySelectorAll('[class*="grid"] > div:not(.day-header)');
            visibleCount += cards.length - 1; // -1 for empty slot if any
        } else {
            if (dayName === selectedDay) {
                section.style.display = 'block';
                const cards = section.querySelectorAll('[class*="grid"] > div:not(.day-header)');
                visibleCount += cards.length - 1;
            } else {
                section.style.display = 'none';
            }
        }
    });
    
    // Update total mata kuliah count
    if (selectedDay === 'all') {
        visibleCount = 9; // Total all courses
    }
    document.getElementById('totalMatkul').textContent = visibleCount;
});
</script>

</x-app-layout>
