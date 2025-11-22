<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Kartu Rencana Studi (KRS)</h1>

        @if (session('success'))
            <div class="mb-4 bg-green-50 border-l-4 border-green-500 p-4 rounded">
                <p class="text-sm text-green-700">{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                <p class="text-sm text-red-700">{{ session('error') }}</p>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                <div class="flex items-center">
                    <div class="bg-[#feffc4] p-3 rounded-lg mr-4">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Total SKS Kurikulum</p>
                        <p class="text-2xl font-bold text-gray-900">144</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                <div class="flex items-center">
                    <div class="bg-[#feffc4] p-3 rounded-lg mr-4">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">SKS Diambil Semester Ini</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $totalSks }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">
                <div class="flex items-center">
                    <div class="bg-[#feffc4] p-3 rounded-lg mr-4">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Sisa SKS Tersedia</p>
                        <p class="text-2xl font-bold {{ $remainingSks <= 3 ? 'text-red-600' : ($remainingSks <= 6 ? 'text-yellow-600' : 'text-gray-900') }}">{{ $remainingSks }}</p>
                        <p class="text-xs text-gray-500 mt-1">dari {{ $maxSks }} SKS maks</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Period Notification -->
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded">
            <div class="flex items-start">
                <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <p class="text-sm font-semibold text-green-800">Pengisian KRS Terbuka</p>
                    <p class="text-xs text-green-700 mt-1">
                        Anda dapat mengisi KRS kapan saja
                    </p>
                </div>
            </div>
        </div>

        @if($totalSks >= $maxSks)
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-red-500 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-red-800">Batas SKS Tercapai</p>
                        <p class="text-xs text-red-700 mt-1">
                            Anda telah mencapai batas maksimal {{ $maxSks }} SKS untuk semester ini. Tidak dapat menambah mata kuliah lagi.
                        </p>
                    </div>
                </div>
            </div>
        @elseif($remainingSks <= 6)
            <div class="mb-6 bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-yellow-500 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-yellow-800">Mendekati Batas SKS</p>
                        <p class="text-xs text-yellow-700 mt-1">
                            Anda hanya dapat mengambil {{ $remainingSks }} SKS lagi dari batas maksimal {{ $maxSks }} SKS.
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- KRS Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
            <div class="bg-[#feffc4] px-6 py-4 border-b border-yellow-300">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">{{ $mahasiswaDetail->user->nama_lengkap }}</h2>
                        <p class="text-sm text-gray-700">NIM: {{ $mahasiswaDetail->nim }} | Prodi: {{ $mahasiswaDetail->program_studi }}</p>
                    </div>
                    @if($isKrsPeriod && $krsList->count() > 0)
                        <button onclick="window.print()" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                            </svg>
                            Cetak KRS
                        </button>
                    @endif
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">No</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Kode</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Mata Kuliah</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Kelas</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Dosen</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">SKS</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                            @if($isKrsPeriod)
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($krsList as $index => $krs)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $krs->kelas->mataKuliah->kode_mk ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $krs->kelas->mataKuliah->nama_mk ?? '-' }}</div>
                                    <div class="text-xs text-gray-500">{{ $krs->kelas->hari ?? '-' }}, {{ substr($krs->kelas->jam_mulai ?? '', 0, 5) }}-{{ substr($krs->kelas->jam_selesai ?? '', 0, 5) }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $krs->kelas->nama_kelas ?? '-' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $krs->kelas->dosenPengampu->nama_lengkap ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#feffc4] text-gray-900 border border-yellow-300">
                                        {{ $krs->kelas->mataKuliah->sks ?? 0 }} SKS
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($krs->status_krs === 'diambil')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">Diambil</span>
                                    @elseif($krs->status_krs === 'selesai')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-800">Selesai</span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-800">Batal</span>
                                    @endif
                                </td>
                                @if($isKrsPeriod)
                                    <td class="px-6 py-4">
                                        @if($krs->status_krs === 'diambil')
                                            <form action="{{ route('krs.destroy', $krs->krs_id) }}" method="POST" class="js-krs-delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                    Batalkan
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ $isKrsPeriod ? 8 : 7 }}" class="px-6 py-12 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <p class="mt-2 text-sm text-gray-600 font-medium">Belum ada mata kuliah yang diambil</p>
                                    <p class="text-xs text-gray-500">Tambahkan mata kuliah dari daftar di bawah</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    @if($krsList->count() > 0)
                        <tfoot class="bg-gray-50 border-t-2 border-gray-200">
                            <tr>
                                <td colspan="{{ $isKrsPeriod ? 5 : 4 }}" class="px-6 py-4 text-sm font-bold text-gray-900 text-right">Total SKS:</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-[#feffc4] text-gray-900 border-2 border-yellow-400">
                                        {{ $totalSks }} SKS
                                    </span>
                                </td>
                                <td colspan="{{ $isKrsPeriod ? 2 : 1 }}"></td>
                            </tr>
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>

        <!-- Available Classes -->
        @if($isKrsPeriod && $availableKelas->count() > 0)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900">Mata Kuliah Tersedia ({{ $mahasiswaDetail->program_studi }})</h3>
                    <p class="text-sm text-gray-600 mt-1">Pilih mata kuliah yang ingin Anda ambil semester ini</p>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($availableKelas as $kelas)
                            <div class="border border-gray-200 rounded-lg p-4 hover:border-[#feffc4] hover:bg-yellow-50 transition">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900">{{ $kelas->mataKuliah->nama_mk }}</h4>
                                        <p class="text-xs text-gray-500 mt-1">{{ $kelas->mataKuliah->kode_mk }} | Kelas {{ $kelas->nama_kelas }}</p>
                                    </div>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-bold bg-[#feffc4] border border-yellow-300">
                                        {{ $kelas->mataKuliah->sks }} SKS
                                    </span>
                                </div>
                                
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        {{ $kelas->dosenPengampu->nama_lengkap ?? '-' }}
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $kelas->hari ?? '-' }}, {{ substr($kelas->jam_mulai ?? '', 0, 5) }} - {{ substr($kelas->jam_selesai ?? '', 0, 5) }}
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                        Kapasitas: {{ $kelas->kapasitas ?? '-' }} mahasiswa
                                    </div>
                                </div>

                                @php
                                    $willExceedLimit = ($totalSks + $kelas->mataKuliah->sks) > $maxSks;
                                @endphp

                                @if($willExceedLimit)
                                    <div class="bg-red-50 border border-red-200 rounded-lg p-3">
                                        <p class="text-xs text-red-700 font-medium">
                                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                            </svg>
                                            Melebihi batas SKS ({{ $totalSks }} + {{ $kelas->mataKuliah->sks }} = {{ $totalSks + $kelas->mataKuliah->sks }} SKS)
                                        </p>
                                    </div>
                                @else
                                    <form action="{{ route('krs.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="kelas_id" value="{{ $kelas->kelas_id }}">
                                        <button type="submit" class="w-full bg-[#feffc4] text-black font-semibold px-4 py-2 rounded-lg hover:bg-yellow-300 border border-yellow-400 transition">
                                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            Ambil Mata Kuliah
                                        </button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.js-krs-delete-form').forEach((form) => {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Batalkan Mata Kuliah?',
                        text: 'Yakin ingin membatalkan mata kuliah ini dari KRS Anda?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Ya, batalkan',
                        cancelButtonText: 'Tidak'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>
