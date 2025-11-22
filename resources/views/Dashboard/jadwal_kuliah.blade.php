<x-app-layout>
<div class="bg-white min-h-screen p-4 sm:p-6 lg:p-8">
    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">Jadwal Kuliah</h1>
            <p class="text-gray-600 mt-2">{{ $mahasiswaDetail->user->nama_lengkap }} - {{ $mahasiswaDetail->program_studi }}</p>
        </div>

        @if($totalMatkul == 0)
            <!-- Empty State -->
            <div class="text-center py-12">
                <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Belum Ada Jadwal</h3>
                <p class="mt-2 text-sm text-gray-500">Anda belum mengambil mata kuliah. Silakan isi KRS terlebih dahulu.</p>
                <div class="mt-6">
                    <a href="{{ route('krs.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-500">
                        <svg class="mr-2 -ml-1 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Isi KRS
                    </a>
                </div>
            </div>
        @else
            <!-- Filter & Info -->
            <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex items-center gap-4">
                    <select id="filterHari" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                        <option value="all">Semua Hari</option>
                        @foreach($jadwalPerHari->keys() as $hari)
                            <option value="{{ $hari }}">{{ $hari }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center gap-2 bg-[#feffc4] px-4 py-2 rounded-lg border border-yellow-400">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm font-medium text-gray-700">Total: <strong id="totalMatkul">{{ $totalMatkul }}</strong> Mata Kuliah</span>
                </div>
            </div>

            <!-- Schedule Cards -->
            <div class="space-y-6">
                @php
                    $colors = ['blue', 'green', 'purple', 'orange', 'red', 'indigo', 'pink', 'yellow'];
                    $colorIndex = 0;
                @endphp

                @foreach($jadwalPerHari as $hari => $kelasList)
                    <div class="day-section" data-day="{{ $hari }}">
                        <!-- Day Header -->
                        <div class="flex items-center gap-4 mb-4">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-[#feffc4]">
                                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">{{ $hari }}</h2>
                                <p class="text-sm text-gray-600">{{ $kelasList->count() }} Mata Kuliah</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($kelasList as $krs)
                                @php
                                    $kelas = $krs->kelas;
                                    $mataKuliah = $kelas->mataKuliah;
                                    $dosen = $kelas->dosenPengampu;
                                    $color = $colors[$colorIndex % count($colors)];
                                    $colorIndex++;
                                @endphp

                                <!-- Course Card -->
                                <a href="{{ route('jadwal.detail', $mataKuliah->kode_mk) }}" class="block group bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-lg hover:border-{{ $color }}-300 transition-all duration-300 overflow-hidden cursor-pointer">
                                    <div class="bg-{{ $color }}-50 p-4 border-b border-{{ $color }}-100">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1">
                                                <h3 class="font-bold text-gray-900 text-lg mb-1">
                                                    {{ $mataKuliah->nama_mk }}
                                                </h3>
                                                <div class="flex items-center gap-3 text-sm text-gray-600">
                                                    <span class="font-medium">{{ $mataKuliah->kode_mk }}</span>
                                                    <span class="px-2 py-0.5 bg-{{ $color }}-100 text-{{ $color }}-700 rounded-full text-xs font-medium">
                                                        {{ $mataKuliah->sks }} SKS
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 w-12 h-12 bg-{{ $color }}-100 rounded-lg flex items-center justify-center">
                                                <svg class="w-6 h-6 text-{{ $color }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="p-4 space-y-3">
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="font-medium">{{ $hari }} {{ substr($kelas->jam_mulai, 0, 5) }} - {{ substr($kelas->jam_selesai, 0, 5) }} WIB</span>
                                        </div>
                                        
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span>Kelas {{ $kelas->nama_kelas }}</span>
                                        </div>
                                        
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            <span>{{ $dosen ? $dosen->nama_lengkap : 'Belum ada dosen' }}</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Quick Stats -->
            @php
                $totalSks = $jadwalPerHari->flatten()->sum(function($krs) {
                    return $krs->kelas->mataKuliah->sks;
                });
                $totalJam = $jadwalPerHari->flatten()->sum(function($krs) {
                    $mulai = \Carbon\Carbon::parse($krs->kelas->jam_mulai);
                    $selesai = \Carbon\Carbon::parse($krs->kelas->jam_selesai);
                    return $mulai->diffInMinutes($selesai) / 60;
                });
            @endphp

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm font-medium mb-1">Total Mata Kuliah</p>
                            <p class="text-3xl font-bold">{{ $totalMatkul }}</p>
                        </div>
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-100 text-sm font-medium mb-1">Total SKS</p>
                            <p class="text-3xl font-bold">{{ $totalSks }}</p>
                        </div>
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl p-6 text-white shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-yellow-100 text-sm font-medium mb-1">Jam Perkuliahan</p>
                            <p class="text-3xl font-bold">{{ number_format($totalJam, 1) }}</p>
                        </div>
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>

<script>
// Filter Hari Functionality
const filterHari = document.getElementById('filterHari');
if (filterHari) {
    filterHari.addEventListener('change', function() {
        const selectedDay = this.value;
        const daySections = document.querySelectorAll('.day-section');
        let visibleCount = 0;
        
        daySections.forEach(section => {
            const dayName = section.getAttribute('data-day');
            
            if (selectedDay === 'all') {
                section.style.display = 'block';
                const cards = section.querySelectorAll('.grid > div');
                visibleCount += cards.length;
            } else {
                if (dayName === selectedDay) {
                    section.style.display = 'block';
                    const cards = section.querySelectorAll('.grid > div');
                    visibleCount += cards.length;
                } else {
                    section.style.display = 'none';
                }
            }
        });
        
        // Update total mata kuliah count
        if (selectedDay === 'all') {
            visibleCount = {{ $totalMatkul }};
        }
        document.getElementById('totalMatkul').textContent = visibleCount;
    });
}
</script>

</x-app-layout>
