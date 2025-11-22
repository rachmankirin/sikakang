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
                    
                    <a href="{{ route('jadwal.detail.rps', $mataKuliah->kode_mk) }}" class="flex items-center gap-2 px-6 py-4 text-gray-600 hover:text-gray-800 font-medium whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <span>RPS & Bahan Ajar</span>
                    </a>
                    
                    <a href="{{ route('jadwal.detail.jurnal', $mataKuliah->kode_mk) }}" class="flex items-center gap-2 px-6 py-4 text-yellow-600 border-b-2 border-yellow-600 font-semibold whitespace-nowrap">
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
                        <h2 class="text-xl font-bold text-gray-900 mb-2">Jurnal Perkuliahan</h2>
                        <p class="text-gray-600">Daftar pertemuan dan status kehadiran Anda di mata kuliah ini.</p>
                    </div>

                    @if($jurnalList->count() > 0)
                        <!-- Jurnal List -->
                        <div class="space-y-4">
                            @foreach($jurnalList as $jurnal)
                                @php
                                    $absensi = $jurnal->absensi->first();
                                    $statusClass = 'bg-gray-100 text-gray-700';
                                    $statusIcon = '•';
                                    
                                    if($absensi) {
                                        switch($absensi->status_kehadiran) {
                                            case 'hadir':
                                                $statusClass = 'bg-green-100 text-green-700 border-green-300';
                                                $statusIcon = '✓';
                                                break;
                                            case 'izin':
                                                $statusClass = 'bg-blue-100 text-blue-700 border-blue-300';
                                                $statusIcon = 'i';
                                                break;
                                            case 'sakit':
                                                $statusClass = 'bg-yellow-100 text-yellow-700 border-yellow-300';
                                                $statusIcon = 's';
                                                break;
                                            case 'alpa':
                                                $statusClass = 'bg-red-100 text-red-700 border-red-300';
                                                $statusIcon = '✗';
                                                break;
                                        }
                                    }
                                @endphp

                                <div class="bg-white border border-gray-200 rounded-lg p-5 hover:border-yellow-300 transition">
                                    <div class="flex items-start justify-between gap-4">
                                        <div class="flex items-start gap-4 flex-1">
                                            <!-- Pertemuan Number -->
                                            <div class="flex-shrink-0 w-14 h-14 bg-[#feffc4] rounded-lg flex items-center justify-center border-2 border-yellow-300">
                                                <span class="font-bold text-gray-900 text-lg">{{ $jurnal->pertemuan_ke }}</span>
                                            </div>

                                            <!-- Jurnal Info -->
                                            <div class="flex-1">
                                                <div class="flex items-center gap-3 mb-2">
                                                    <h3 class="font-bold text-gray-900">Pertemuan {{ $jurnal->pertemuan_ke }}</h3>
                                                    @if($jurnal->tanggal_perkuliahan)
                                                        <span class="text-sm text-gray-600">
                                                            • {{ \Carbon\Carbon::parse($jurnal->tanggal_perkuliahan)->format('d M Y') }}
                                                        </span>
                                                    @endif
                                                </div>
                                                
                                                @if($jurnal->materi)
                                                    <p class="text-gray-700 mb-2"><span class="font-medium">Materi:</span> {{ $jurnal->materi }}</p>
                                                @endif
                                                
                                                @if($jurnal->jam_mulai && $jurnal->jam_selesai)
                                                    <p class="text-sm text-gray-600">
                                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                        </svg>
                                                        {{ substr($jurnal->jam_mulai, 0, 5) }} - {{ substr($jurnal->jam_selesai, 0, 5) }} WIB
                                                    </p>
                                                @endif

                                                @if($absensi && $absensi->keterangan)
                                                    <div class="mt-2 p-2 bg-gray-50 rounded text-sm text-gray-600">
                                                        <span class="font-medium">Keterangan:</span> {{ $absensi->keterangan }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Status Kehadiran -->
                                        <div class="flex-shrink-0">
                                            @if($absensi)
                                                <div class="px-4 py-2 rounded-lg border-2 {{ $statusClass }} text-center min-w-[100px]">
                                                    <p class="text-xs font-medium uppercase tracking-wider mb-1">Status</p>
                                                    <p class="text-lg font-bold">{{ ucfirst($absensi->status_kehadiran) }}</p>
                                                </div>
                                            @else
                                                <div class="px-4 py-2 rounded-lg border-2 bg-gray-50 text-gray-500 text-center min-w-[100px]">
                                                    <p class="text-xs font-medium uppercase tracking-wider mb-1">Status</p>
                                                    <p class="text-sm font-medium">Belum Presensi</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="bg-gray-50 border-2 border-gray-200 rounded-xl p-12 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Belum Ada Jurnal Perkuliahan</h3>
                                <p class="text-gray-600 max-w-md">
                                    Dosen belum membuat jurnal perkuliahan. Jurnal akan muncul setelah pertemuan dilaksanakan.
                                </p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
