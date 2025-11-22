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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 00 2-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
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
                    
                    <a href="{{ route('jadwal.detail.jurnal', $mataKuliah->kode_mk) }}" class="flex items-center gap-2 px-6 py-4 text-gray-600 hover:text-gray-800 font-medium whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span>Jurnal Perkuliahan</span>
                    </a>
                    
                    <a href="{{ route('jadwal.detail.rekap', $mataKuliah->kode_mk) }}" class="flex items-center gap-2 px-6 py-4 text-yellow-600 border-b-2 border-yellow-600 font-semibold whitespace-nowrap">
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
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Rekap Kehadiran</h2>
                        <p class="text-gray-600 mb-6">Statistik dan detail kehadiran Anda untuk setiap pertemuan mata kuliah ini.</p>
                    </div>

                    @if($jurnalList->count() > 0)
                        <!-- Statistics Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
                            <!-- Persentase Kehadiran -->
                            <div class="bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl p-6 text-white shadow-sm">
                                <div class="flex items-center justify-between mb-2">
                                    <svg class="w-8 h-8 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="text-3xl font-bold mb-1">{{ number_format($persentaseKehadiran, 1) }}%</div>
                                <div class="text-sm font-medium opacity-90">Persentase Kehadiran</div>
                            </div>

                            <!-- Total Hadir -->
                            <div class="bg-white border-2 border-green-200 rounded-xl p-6 shadow-sm">
                                <div class="flex items-center justify-between mb-2">
                                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="text-3xl font-bold text-gray-900 mb-1">{{ $totalHadir }}</div>
                                <div class="text-sm font-medium text-gray-600">Hadir</div>
                            </div>

                            <!-- Total Izin -->
                            <div class="bg-white border-2 border-blue-200 rounded-xl p-6 shadow-sm">
                                <div class="flex items-center justify-between mb-2">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="text-3xl font-bold text-gray-900 mb-1">{{ $totalIzin }}</div>
                                <div class="text-sm font-medium text-gray-600">Izin</div>
                            </div>

                            <!-- Total Sakit -->
                            <div class="bg-white border-2 border-yellow-200 rounded-xl p-6 shadow-sm">
                                <div class="flex items-center justify-between mb-2">
                                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                </div>
                                <div class="text-3xl font-bold text-gray-900 mb-1">{{ $totalSakit }}</div>
                                <div class="text-sm font-medium text-gray-600">Sakit</div>
                            </div>

                            <!-- Total Alpa -->
                            <div class="bg-white border-2 border-red-200 rounded-xl p-6 shadow-sm">
                                <div class="flex items-center justify-between mb-2">
                                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </div>
                                <div class="text-3xl font-bold text-gray-900 mb-1">{{ $totalAlpa }}</div>
                                <div class="text-sm font-medium text-gray-600">Alpa</div>
                            </div>
                        </div>

                        <!-- Detailed Table -->
                        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Pertemuan</th>
                                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Materi</th>
                                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jam</th>
                                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status Kehadiran</th>
                                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach($jurnalList as $jurnal)
                                            @php
                                                $absensi = $jurnal->absensi->where('mahasiswa_user_id', auth()->id())->first();
                                            @endphp
                                            <tr class="hover:bg-gray-50 transition">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center gap-2">
                                                        <span class="inline-flex items-center justify-center w-8 h-8 bg-[#feffc4] text-gray-900 rounded-full font-bold text-sm">
                                                            {{ $jurnal->pertemuan_ke }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ \Carbon\Carbon::parse($jurnal->tanggal_perkuliahan)->format('d M Y') }}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-900">
                                                    <div class="max-w-xs truncate">{{ $jurnal->materi }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                    {{ \Carbon\Carbon::parse($jurnal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jurnal->jam_selesai)->format('H:i') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if($absensi)
                                                        @if($absensi->status_kehadiran === 'hadir')
                                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                                </svg>
                                                                Hadir
                                                            </span>
                                                        @elseif($absensi->status_kehadiran === 'izin')
                                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                                                </svg>
                                                                Izin
                                                            </span>
                                                        @elseif($absensi->status_kehadiran === 'sakit')
                                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                                </svg>
                                                                Sakit
                                                            </span>
                                                        @elseif($absensi->status_kehadiran === 'alpa')
                                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                                </svg>
                                                                Alpa
                                                            </span>
                                                        @endif
                                                    @else
                                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                                                            </svg>
                                                            Belum Presensi
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-600">
                                                    @if($absensi && $absensi->keterangan)
                                                        <div class="max-w-xs truncate">{{ $absensi->keterangan }}</div>
                                                    @else
                                                        <span class="text-gray-400">-</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Info Note -->
                        <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                            <div class="flex gap-3">
                                <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <div class="text-sm text-blue-800">
                                    <p class="font-semibold mb-1">Informasi Kehadiran</p>
                                    <p>Persentase kehadiran dihitung berdasarkan status <strong>Hadir</strong> dari total pertemuan yang telah dilaksanakan. Status <strong>Izin</strong> dan <strong>Sakit</strong> tidak dihitung sebagai kehadiran.</p>
                                </div>
                            </div>
                        </div>

                    @else
                        <!-- Empty State -->
                        <div class="bg-yellow-50 border-2 border-yellow-200 rounded-xl p-8 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Belum Ada Data Kehadiran</h3>
                                <p class="text-gray-600 max-w-md">
                                    Belum ada jurnal perkuliahan yang dicatat untuk mata kuliah ini. 
                                    Rekap kehadiran akan muncul setelah dosen mengisi jurnal perkuliahan.
                                </p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
