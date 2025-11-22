<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- Back Button -->
            <a href="{{ route('jadwal.index') }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800 mb-6 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span class="font-medium">Kembali ke Jadwal</span>
            </a>

            <!-- Header Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">
                    <!-- Left: Course Info -->
                    <div class="flex-1">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-16 h-16 bg-[#feffc4] rounded-xl flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $mataKuliah->nama_mk }}</h1>
                                
                                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mb-4">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                        </svg>
                                        <span class="font-medium">{{ $mataKuliah->kode_mk }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <span>{{ $mataKuliah->sks }} SKS</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span>Kelas {{ $kelas->nama_kelas }}</span>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3">
                                    <div class="flex items-center gap-2 text-sm text-gray-700">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <span class="font-medium">{{ $dosen ? $dosen->nama_lengkap : 'Belum ada dosen' }}</span>
                                    </div>
                                    <span class="text-gray-400">•</span>
                                    <div class="flex items-center gap-2 text-sm text-gray-700">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                        <span>{{ $totalMahasiswa }} Mahasiswa</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Quick Info -->
                    <div class="flex flex-col gap-3">
                        <div class="bg-blue-50 border border-blue-200 rounded-lg px-4 py-3 text-center">
                            <p class="text-xs text-blue-600 font-medium mb-1">Pertemuan</p>
                            <p class="text-2xl font-bold text-blue-700">{{ $totalPertemuan }}/14</p>
                        </div>
                        <div class="bg-green-50 border border-green-200 rounded-lg px-4 py-3 text-center">
                            <p class="text-xs text-green-600 font-medium mb-1">Jadwal</p>
                            <p class="text-sm font-bold text-green-700">{{ $kelas->hari }}</p>
                            <p class="text-xs text-green-600">{{ substr($kelas->jam_mulai, 0, 5) }} - {{ substr($kelas->jam_selesai, 0, 5) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
                <div class="flex border-b border-gray-200 overflow-x-auto">
                    <a href="{{ route('jadwal.detail', $mataKuliah->kode_mk) }}" class="flex items-center gap-2 px-6 py-4 text-yellow-600 border-b-2 border-yellow-600 font-semibold whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Informasi</span>
                    </a>
                    
                    <a href="{{ route('jadwal.detail.rps', $mataKuliah->kode_mk) }}" class="flex items-center gap-2 px-6 py-4 text-gray-600 hover:text-gray-800 font-medium whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <span>RPS & Bahan Ajar</span>
                    </a>
                    
                    <a href="{{ route('jadwal.detail.jurnal', $mataKuliah->kode_mk) }}" class="flex items-center gap-2 px-6 py-4 text-gray-600 hover:text-gray-800 font-medium whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span>Jurnal Perkuliahan</span>
                    </a>
                    
                    <a href="{{ route('jadwal.detail.rekap', $mataKuliah->kode_mk) }}" class="flex items-center gap-2 px-6 py-4 text-gray-600 hover:text-gray-800 font-medium whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 00 2-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <span>Rekap Kehadiran</span>
                    </a>

                    <a href="{{ route('jadwal.detail.validasi', $mataKuliah->kode_mk) }}" class="flex items-center gap-2 px-6 py-4 text-gray-600 hover:text-gray-800 font-medium whitespace-nowrap relative">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Validasi Jurnal</span>
                        @if($jurnalNeedingValidationCount > 0)
                            <span class="inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-red-500 rounded-full">
                                {{ $jurnalNeedingValidationCount }}
                            </span>
                        @endif
                    </a>
                </div>
                    
                    <a href="{{ route('jadwal.detail.rekap', $mataKuliah->kode_mk) }}" class="flex items-center gap-2 px-6 py-4 text-gray-600 hover:text-gray-800 font-medium whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 00 2-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <span>Rekap Kehadiran</span>
                    </a>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <!-- Deskripsi Mata Kuliah -->
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-3">Deskripsi Mata Kuliah</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $mataKuliah->deskripsi ?? 'Deskripsi mata kuliah belum tersedia.' }}
                        </p>
                    </div>

                    <!-- Daftar Mahasiswa -->
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Daftar Mahasiswa ({{ $totalMahasiswa }})</h2>
                        
                        @if($mahasiswaList->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($mahasiswaList as $index => $mahasiswa)
                                    <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg border border-gray-200 hover:border-yellow-300 hover:bg-yellow-50 transition">
                                        <div class="flex-shrink-0 w-10 h-10 bg-[#feffc4] rounded-full flex items-center justify-center">
                                            <span class="font-bold text-gray-700">{{ $index + 1 }}</span>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="font-semibold text-gray-900 truncate">{{ $mahasiswa->nama_lengkap }}</p>
                                            <p class="text-sm text-gray-600">NIM: {{ $mahasiswa->mahasiswaDetail->nim ?? '-' }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12 bg-gray-50 rounded-lg">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <p class="mt-2 text-sm text-gray-600 font-medium">Belum ada mahasiswa terdaftar</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
