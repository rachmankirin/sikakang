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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Validation Badge -->
                    <div class="flex flex-col gap-3">
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg px-4 py-3 text-center">
                            <p class="text-xs text-yellow-600 font-medium mb-1">Menunggu Validasi</p>
                            <p class="text-2xl font-bold text-yellow-700">{{ $jurnalNeedingValidationCount }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="bg-white rounded-t-xl shadow-sm border border-gray-200 border-b-0">
                <div class="flex overflow-x-auto scrollbar-hide">
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
                    
                    <a href="{{ route('jadwal.detail.rekap', $mataKuliah->kode_mk) }}" class="flex items-center gap-2 px-6 py-4 text-gray-600 hover:text-gray-800 font-medium whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 00 2-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <span>Rekap Kehadiran</span>
                    </a>

                    <a href="{{ route('jadwal.detail.validasi', $mataKuliah->kode_mk) }}" class="flex items-center gap-2 px-6 py-4 text-gray-900 font-semibold whitespace-nowrap relative border-b-2 border-[#feffc4]">
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
            </div>

            <!-- Content -->
            <div class="bg-white rounded-b-xl shadow-sm border border-gray-200 p-6">
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-2">Validasi Jurnal Perkuliahan</h2>
                    <p class="text-gray-600">Validasi jurnal perkuliahan yang telah diisi oleh dosen untuk memastikan kehadiran Anda tercatat dengan benar.</p>
                </div>

                @if($jurnalList->count() > 0)
                    <div class="space-y-4">
                        @foreach($jurnalList as $index => $jurnal)
                            <div class="border border-gray-200 rounded-lg p-6 hover:border-yellow-300 hover:shadow-md transition">
                                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                                    <!-- Left: Jurnal Info -->
                                    <div class="flex-1">
                                        <div class="flex items-start gap-4">
                                            <div class="flex-shrink-0 w-12 h-12 bg-yellow-50 rounded-lg flex items-center justify-center border border-yellow-200">
                                                <span class="text-lg font-bold text-yellow-700">{{ $jurnal->pertemuan_ke }}</span>
                                            </div>
                                            <div class="flex-1">
                                                <h3 class="font-semibold text-gray-900 mb-2">Pertemuan {{ $jurnal->pertemuan_ke }}</h3>
                                                
                                                <div class="space-y-2 text-sm">
                                                    <div class="flex items-center gap-2 text-gray-600">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                        </svg>
                                                        <span>{{ \Carbon\Carbon::parse($jurnal->tanggal)->isoFormat('dddd, D MMMM YYYY') }}</span>
                                                    </div>
                                                    
                                                    <div class="flex items-center gap-2 text-gray-600">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                        </svg>
                                                        <span>{{ $jurnal->jam_mulai }} - {{ $jurnal->jam_selesai }}</span>
                                                    </div>

                                                    <div class="flex items-start gap-2 text-gray-600">
                                                        <svg class="w-4 h-4 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                        </svg>
                                                        <span class="flex-1">{{ $jurnal->materi }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right: Action Button -->
                                    <div class="flex-shrink-0">
                                        <button onclick="validateJurnal({{ $jurnal->jurnal_id }})" class="px-6 py-2.5 bg-[#feffc4] hover:bg-yellow-300 text-gray-900 font-medium rounded-lg transition flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            <span>Validasi</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16 bg-gray-50 rounded-lg">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Semua Jurnal Sudah Divalidasi</h3>
                        <p class="text-gray-600">Tidak ada jurnal yang perlu divalidasi saat ini.</p>
                    </div>
                @endif
            </div>

        </div>
    </div>

    <script>
        function validateJurnal(jurnalId) {
            Swal.fire({
                title: 'Validasi Jurnal',
                text: 'Apakah Anda yakin ingin memvalidasi jurnal perkuliahan ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#feffc4',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Validasi',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'text-gray-900 font-semibold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // TODO: Add AJAX request to validate jurnal
                    fetch(`/jadwal/jurnal/validate/${jurnalId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Jurnal perkuliahan berhasil divalidasi.',
                                icon: 'success',
                                confirmButtonColor: '#feffc4',
                                customClass: {
                                    confirmButton: 'text-gray-900 font-semibold'
                                }
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Gagal!',
                                text: data.message || 'Terjadi kesalahan saat memvalidasi jurnal.',
                                icon: 'error',
                                confirmButtonColor: '#d33'
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Terjadi kesalahan pada sistem.',
                            icon: 'error',
                            confirmButtonColor: '#d33'
                        });
                    });
                }
            });
        }
    </script>
</x-app-layout>
