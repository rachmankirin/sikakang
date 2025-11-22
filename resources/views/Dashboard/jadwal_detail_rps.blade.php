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
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-16 h-16 bg-[#feffc4] rounded-xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $mataKuliah->nama_mk }}</h1>
                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                            <span class="font-medium">{{ $mataKuliah->kode_mk }}</span>
                            <span>•</span>
                            <span>{{ $mataKuliah->sks }} SKS</span>
                            <span>•</span>
                            <span>Kelas {{ $kelas->nama_kelas }}</span>
                            <span>•</span>
                            <span>{{ $dosen ? $dosen->nama_lengkap : 'Belum ada dosen' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
                <div class="flex border-b border-gray-200 overflow-x-auto">
                    <a href="{{ route('jadwal.detail', $mataKuliah->kode_mk) }}" class="flex items-center gap-2 px-6 py-4 text-gray-600 hover:text-gray-800 font-medium whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Informasi</span>
                    </a>
                    
                    <a href="{{ route('jadwal.detail.rps', $mataKuliah->kode_mk) }}" class="flex items-center gap-2 px-6 py-4 text-yellow-600 border-b-2 border-yellow-600 font-semibold whitespace-nowrap">
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

                <!-- Content -->
                <div class="p-6">
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">RPS & Bahan Ajar</h2>
                        <p class="text-gray-600 mb-6">Rencana Pembelajaran Semester dan materi bahan ajar untuk mata kuliah ini.</p>
                    </div>

                    <!-- Empty State / Content from Dosen -->
                    <div class="bg-yellow-50 border-2 border-yellow-200 rounded-xl p-8 text-center">
                        <div class="flex flex-col items-center">
                            <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">RPS & Bahan Ajar Belum Tersedia</h3>
                            <p class="text-gray-600 max-w-md">
                                Dosen pengampu belum mengunggah RPS dan bahan ajar untuk mata kuliah ini. 
                                Silakan hubungi dosen atau tunggu hingga materi tersedia.
                            </p>
                            
                            @if($dosen)
                                <div class="mt-6 p-4 bg-white rounded-lg border border-yellow-200">
                                    <p class="text-sm text-gray-600 mb-1">Dosen Pengampu:</p>
                                    <p class="font-semibold text-gray-900">{{ $dosen->nama_lengkap }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Note: When dosen uploads data, show the documents here -->
                    <!-- Example structure for when data is available:
                    <div class="space-y-4">
                        <div class="bg-white border border-gray-200 rounded-lg p-4 hover:border-yellow-400 transition">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">RPS Semester Genap 2024/2025</h4>
                                        <p class="text-sm text-gray-600">PDF • 2.4 MB • Diunggah 12 Jan 2025</p>
                                    </div>
                                </div>
                                <a href="#" class="px-4 py-2 bg-[#feffc4] text-gray-900 font-medium rounded-lg hover:bg-yellow-300 transition">
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>
                    -->

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
