<x-app-layout>
    <div class="bg-white min-h-screen p-4 sm:p-6 lg:p-8">
        <div class="max-w-4xl mx-auto">

            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center mb-4">
                    <a href="{{ route('surat.riwayat') }}" class="text-gray-500 hover:text-gray-700 mr-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Detail Pengajuan Surat</h1>
                        <p class="text-gray-600 mt-1">Informasi lengkap pengajuan surat</p>
                    </div>
                </div>
            </div>

            <!-- Status Badge -->
            <div class="mb-6">
                @if($pengajuan->status_pengajuan === 'menunggu')
                    <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800 border border-yellow-200">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        Status: Menunggu Persetujuan
                    </div>
                @elseif($pengajuan->status_pengajuan === 'disetujui')
                    <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-800 border border-green-200">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Status: Disetujui
                    </div>
                @else
                    <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-red-100 text-red-800 border border-red-200">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        Status: Ditolak
                    </div>
                @endif
            </div>

            <!-- Detail Cards -->
            <div class="space-y-6">
                
                <!-- Informasi Surat -->
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
                    <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-[#feffc4]" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z"/>
                            <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"/>
                        </svg>
                        Informasi Surat
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Jenis Surat</p>
                            <p class="text-base font-semibold text-gray-900">{{ $pengajuan->jenisSurat->nama_surat ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Estimasi Selesai</p>
                            <p class="text-base font-semibold text-gray-900">
                                @if($pengajuan->jenisSurat && $pengajuan->jenisSurat->estimasi_hari)
                                    {{ $pengajuan->jenisSurat->estimasi_hari }} hari kerja
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Tanggal Pengajuan</p>
                            <p class="text-base font-semibold text-gray-900">{{ \Carbon\Carbon::parse($pengajuan->created_at)->format('d F Y, H:i') }} WIB</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Tanggal Keperluan</p>
                            <p class="text-base font-semibold text-gray-900">{{ \Carbon\Carbon::parse($pengajuan->tanggal_keperluan)->format('d F Y') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Keperluan -->
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
                    <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-[#feffc4]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        Keperluan
                    </h2>
                    <p class="text-gray-700 whitespace-pre-line">{{ $pengajuan->keperluan }}</p>
                </div>

                <!-- Informasi Pemohon -->
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
                    <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-[#feffc4]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        Informasi Pemohon
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Nama Mahasiswa</p>
                            <p class="text-base font-semibold text-gray-900">{{ $pengajuan->mahasiswa->nama_lengkap ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">NIM</p>
                            <p class="text-base font-semibold text-gray-900">{{ $pengajuan->mahasiswa->mahasiswaDetail->nim ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Program Studi</p>
                            <p class="text-base font-semibold text-gray-900">{{ $pengajuan->mahasiswa->mahasiswaDetail->program_studi ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Dosen PA</p>
                            <p class="text-base font-semibold text-gray-900">{{ $pengajuan->dosenPa->nama_lengkap ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Status Persetujuan -->
                @if($pengajuan->status_pengajuan === 'disetujui')
                    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                        <h2 class="text-lg font-bold text-green-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Persetujuan
                        </h2>
                        <div class="space-y-2">
                            <div>
                                <p class="text-sm text-green-700 mb-1">Tanggal Disetujui</p>
                                <p class="text-base font-semibold text-green-900">
                                    {{ $pengajuan->tanggal_disetujui ? \Carbon\Carbon::parse($pengajuan->tanggal_disetujui)->format('d F Y, H:i') . ' WIB' : '-' }}
                                </p>
                            </div>
                            @if($pengajuan->catatan)
                                <div>
                                    <p class="text-sm text-green-700 mb-1">Catatan</p>
                                    <p class="text-base text-green-900">{{ $pengajuan->catatan }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @elseif($pengajuan->status_pengajuan === 'ditolak')
                    <div class="bg-red-50 border border-red-200 rounded-xl p-6">
                        <h2 class="text-lg font-bold text-red-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            Alasan Penolakan
                        </h2>
                        <p class="text-base text-red-900">{{ $pengajuan->catatan ?? 'Tidak ada catatan' }}</p>
                    </div>
                @endif

            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex flex-col sm:flex-row gap-3">
                <a href="{{ route('surat.riwayat') }}"
                    class="flex-1 text-center bg-white text-gray-700 font-semibold px-6 py-3 rounded-lg border border-gray-300 hover:bg-gray-50 transition">
                    Kembali ke Riwayat
                </a>
                @if($pengajuan->status_pengajuan === 'disetujui' && $pengajuan->file_path)
                    <a href="{{ asset('storage/' . $pengajuan->file_path) }}" target="_blank"
                        class="flex-1 text-center bg-[#feffc4] text-black font-semibold px-6 py-3 rounded-lg hover:bg-yellow-300 border border-yellow-400 transition">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Download Surat
                    </a>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
