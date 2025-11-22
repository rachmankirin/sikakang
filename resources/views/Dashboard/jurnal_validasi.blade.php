<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- Back Button -->
            <a href="{{ route('jadwal.detail', $mataKuliah->kode_mk) }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800 mb-6 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span class="font-medium">Kembali ke Detail</span>
            </a>

            <!-- Header Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-16 h-16 bg-[#feffc4] rounded-xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Validasi Jurnal Perkuliahan</h1>
                        <p class="text-gray-600 mb-2">{{ $mataKuliah->nama_mk }}</p>
                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                            <span class="font-medium">{{ $mataKuliah->kode_mk }}</span>
                            <span>•</span>
                            <span>Kelas {{ $kelas->nama_kelas }}</span>
                            <span>•</span>
                            <span>{{ $dosen ? $dosen->nama_lengkap : 'Belum ada dosen' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Box -->
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">
                <div class="flex gap-3">
                    <svg class="w-6 h-6 text-blue-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <div class="text-sm text-blue-800">
                        <p class="font-semibold mb-1">Tentang Validasi Jurnal</p>
                        <p>Jurnal perkuliahan memerlukan validasi 2 sisi: <strong>dosen</strong> harus memvalidasi presensi terlebih dahulu, kemudian <strong>salah satu perwakilan mahasiswa</strong> dapat memvalidasi. Pertemuan yang belum divalidasi lengkap dianggap belum terlaksana dan tidak akan muncul di rekap kehadiran.</p>
                    </div>
                </div>
            </div>

            <!-- Jurnal List -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-2">Jurnal Menunggu Validasi Mahasiswa</h2>
                    <p class="text-gray-600">Daftar jurnal yang sudah divalidasi dosen dan menunggu validasi dari mahasiswa.</p>
                </div>

                @if($jurnalNeedingValidation->count() > 0)
                    <div class="space-y-4">
                        @foreach($jurnalNeedingValidation as $jurnal)
                            <div class="border border-gray-200 rounded-xl p-6 hover:border-yellow-300 transition" id="jurnal-{{ $jurnal->jurnal_id }}">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-3">
                                            <span class="inline-flex items-center justify-center w-10 h-10 bg-[#feffc4] text-gray-900 rounded-full font-bold">
                                                {{ $jurnal->pertemuan_ke }}
                                            </span>
                                            <div>
                                                <h3 class="text-lg font-bold text-gray-900">Pertemuan {{ $jurnal->pertemuan_ke }}</h3>
                                                <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($jurnal->tanggal_perkuliahan)->format('l, d F Y') }}</p>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                            <div>
                                                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Jam Perkuliahan</p>
                                                <p class="text-sm text-gray-900">
                                                    {{ \Carbon\Carbon::parse($jurnal->jam_mulai)->format('H:i') }} - 
                                                    {{ \Carbon\Carbon::parse($jurnal->jam_selesai)->format('H:i') }}
                                                </p>
                                            </div>
                                            <div>
                                                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Metode Pembelajaran</p>
                                                <p class="text-sm text-gray-900">{{ $jurnal->metode_pembelajaran ?? '-' }}</p>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Materi Perkuliahan</p>
                                            <p class="text-sm text-gray-900">{{ $jurnal->materi }}</p>
                                        </div>

                                        <div class="flex items-center gap-4">
                                            <div class="flex items-center gap-2">
                                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="text-sm font-medium text-green-700">Sudah divalidasi dosen</span>
                                            </div>
                                            <span class="text-sm text-gray-500">
                                                oleh {{ $jurnal->dosenValidator ? $jurnal->dosenValidator->name : 'N/A' }} • 
                                                {{ $jurnal->waktu_validasi_dosen ? \Carbon\Carbon::parse($jurnal->waktu_validasi_dosen)->diffForHumans() : '' }}
                                            </span>
                                        </div>

                                        <div class="mt-3">
                                            <p class="text-xs text-gray-500">
                                                <strong>{{ $jurnal->absensi->count() }}</strong> mahasiswa telah presensi
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex-shrink-0">
                                        <button 
                                            onclick="validateJurnal({{ $jurnal->jurnal_id }})"
                                            class="px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-lg transition flex items-center gap-2"
                                        >
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Validasi
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-12">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Tidak Ada Jurnal yang Perlu Divalidasi</h3>
                        <p class="text-gray-600 max-w-md mx-auto">
                            Semua jurnal perkuliahan sudah divalidasi atau belum ada jurnal yang divalidasi oleh dosen.
                        </p>
                    </div>
                @endif
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function validateJurnal(jurnalId) {
            Swal.fire({
                title: 'Konfirmasi Validasi',
                html: 'Anda yakin ingin memvalidasi jurnal perkuliahan ini?<br><small class="text-gray-600">Dengan memvalidasi, Anda menyatakan bahwa pertemuan telah terlaksana sesuai dengan jurnal yang tercatat.</small>',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#f59e0b',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Validasi',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading
                    Swal.fire({
                        title: 'Memproses...',
                        text: 'Sedang memvalidasi jurnal',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Send AJAX request
                    fetch(`/jurnal/${jurnalId}/validate`, {
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
                                text: data.message,
                                icon: 'success',
                                confirmButtonColor: '#f59e0b'
                            }).then(() => {
                                // Remove the validated jurnal card
                                document.getElementById(`jurnal-${jurnalId}`).remove();
                                
                                // Check if there are no more jurnals
                                const remainingJurnals = document.querySelectorAll('[id^="jurnal-"]');
                                if (remainingJurnals.length === 0) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Gagal!',
                                text: data.message,
                                icon: 'error',
                                confirmButtonColor: '#f59e0b'
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Terjadi kesalahan saat memvalidasi jurnal',
                            icon: 'error',
                            confirmButtonColor: '#f59e0b'
                        });
                    });
                }
            });
        }
    </script>
</x-app-layout>
