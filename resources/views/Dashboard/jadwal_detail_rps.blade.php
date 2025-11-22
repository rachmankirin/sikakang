<x-app-layout>
    <div class="bg-white min-h-screen p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">

            <!-- Breadcrumb -->
            <nav class="mb-6 text-sm text-gray-600">
                <span>Perkuliahan</span>
                <span class="mx-2">›</span>
                <a href="/jadwal" class="text-blue-600 hover:underline">Jadwal Kuliah</a>
                <span class="mx-2">›</span>
                <span class="text-gray-900 font-semibold">Detail</span>
            </nav>

            <!-- Back Button -->
            <a href="/jadwal" class="inline-flex items-center text-gray-600 hover:text-gray-900 mb-6">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali
            </a>

            <h1 class="text-3xl font-bold text-gray-900 mb-8">Detail Jadwal</h1>

            <!-- Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white border-2 border-blue-400 rounded-lg p-6">
                    <div class="space-y-3">
                        <div>
                            <p class="text-sm text-gray-600">Kode Jadwal</p>
                            <p class="text-lg font-semibold text-gray-900">26133107</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Mata Kuliah</p>
                            <p class="text-lg font-semibold text-gray-900">Pemrograman Web</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Kelas</p>
                            <p class="text-lg font-semibold text-gray-900">C-24</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white border-2 border-blue-400 rounded-lg p-6">
                    <div class="space-y-3">
                        <div>
                            <p class="text-sm text-gray-600">Dosen</p>
                            <p class="text-lg font-semibold text-gray-900">Yulian Arnsol, S. Kom, M. Kom</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Ruang dan Waktu</p>
                            <p class="text-lg font-semibold text-gray-900">Ruang Lab Informatika, Rabu 13:30 - 16:00</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Pertemuan Terlaksana</p>
                            <p class="text-lg font-semibold text-gray-900">8 Kali</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Navigation -->
            <div class="mb-6">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <a href="{{ route('jadwal.detail.rps', urlencode($kelas->nama_kelas)) }}"
                        class="text-center py-3 px-4 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-600 transition">
                        RPS & Bahan Ajar
                    </a>
                    <a href="{{ route('jadwal.detail', urlencode($kelas->nama_kelas)) }}"
                        class="text-center py-3 px-4 bg-blue-100 text-blue-700 rounded-lg font-semibold hover:bg-blue-200 transition">
                        Jurnal Perkuliahan
                    </a>

                    <a href="{{ route('jadwal.detail.rekap', urlencode($kelas->nama_kelas)) }}"
                        class="text-center py-3 px-4 bg-blue-100 text-blue-700 rounded-lg font-semibold hover:bg-blue-200 transition">
                        Rekap Jurnal Perkuliahan
                    </a>

                </div>
            </div>

            <!-- Content Section -->
            <div class="bg-blue-50 rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-6">RPS & BAHAN AJAR</h2>

                <!-- Bahan Ajar -->
                <div class="bg-white rounded-lg p-6 mb-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Bahan Ajar</h3>
                    <div class="flex items-center justify-between bg-blue-50 p-4 rounded-lg border-2 border-blue-200">
                        <div class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span class="text-gray-700 font-medium">Buku Ajar Pemrograman Website</span>
                        </div>
                        <a href="#"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold transition flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Download
                        </a>
                    </div>
                </div>

                <!-- RPS Materi Table -->
                <div class="bg-white rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">RPS Materi</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-blue-100">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">No</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">CPMK</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">Materi</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">Metode
                                        Penyampaian</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">Alokasi Waktu
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @php
                                    $materials = [
                                        [
                                            'KONSEP DASAR WEB',
                                            'Tut',
                                            '1 Tut : 6 menit, 2 Praktek : 50 menit, 3 Kegiatan : 55 menit',
                                        ],
                                        ['HTML', 'Tut', '1 Tut : 6 menit, 2 Praktek : 50 menit, 3 Kegiatan : 55 menit'],
                                        ['PHP', 'Tut', '1 Tut : 6 menit, 2 Praktek : 50 menit, 3 Kegiatan : 55 menit'],
                                        [
                                            'Operator',
                                            'Tut',
                                            '1 Tut : 6 menit, 2 Praktek : 50 menit, 3 Kegiatan : 55 menit',
                                        ],
                                        [
                                            'PENGGUNAAN FORM DAN PENGGUNAAN HTTP SERVER',
                                            'Tut',
                                            '1 Tut : 6 menit, 2 Praktek : 50 menit, 3 Kegiatan : 55 menit',
                                        ],
                                        [
                                            'PERCABANGAN',
                                            'Tut',
                                            '1 Tut : 6 menit, 2 Praktek : 50 menit, 3 Kegiatan : 55 menit',
                                        ],
                                        [
                                            'PERULANGAN',
                                            'Tut',
                                            '1 Tut : 6 menit, 2 Praktek : 50 menit, 3 Kegiatan : 55 menit',
                                        ],
                                        [
                                            'JAVASCRIPT',
                                            'Tut',
                                            '1 Tut : 6 menit, 2 Praktek : 50 menit, 3 Kegiatan : 55 menit',
                                        ],
                                        ['CSS', 'Tut', '1 Tut : 6 menit, 2 Praktek : 50 menit, 3 Kegiatan : 55 menit'],
                                        [
                                            'MEMBUAT DESAINER WEB RESPONSIVE MENGGUNAKAN CSS',
                                            'Tut',
                                            '1 Tut : 6 menit, 2 Praktek : 50 menit, 3 Kegiatan : 55 menit',
                                        ],
                                    ];
                                @endphp
                                @foreach ($materials as $index => $material)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-4 text-sm">{{ $index + 1 }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-700">Mahasiswa mampu menguasai keseharian
                                            pemrograman website</td>
                                        <td class="px-4 py-4 text-sm font-semibold text-gray-900">{{ $material[0] }}
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-700">{{ $material[1] }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-700">{!! nl2br($material[2]) !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Evaluasi Aspek -->
                    <div class="mt-8">
                        <h4 class="text-lg font-bold text-gray-900 mb-4">Evaluasi Aspek</h4>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">No</th>
                                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">Aspek
                                            Evaluasi</th>
                                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">Rencana
                                            Evaluasi</th>
                                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">Bobot</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @php
                                        $evaluations = [
                                            [
                                                'Afektifitas (Variasi)',
                                                '10. Kehadiran refleksif di kelas dalam pembelajaran mata pembelajaran, 20. Tugas dalam mengembangkan pembelajaran, serta keterlibatan dalam satu mata kegiatan dengan kehadiran, 30. Keterlibatan dalam kelas dengan presentasi.',
                                                '5',
                                            ],
                                            [
                                                'Unsur Projek',
                                                'Implementasi hasil pembelajaran berupa produk aplikasi',
                                                '32',
                                            ],
                                            ['Target', 'Nilai Target ditentukan dalam aktivitas pertemuan', '0'],
                                            ['Quiz', 'Nilai Quiz ditentukan dalam aktivitas pertemuan', '0'],
                                            [
                                                'Ujian Tengah Semester',
                                                'Pengujian kompetensi tertentu, yang dilaksanakan secara terpadu.',
                                                '3',
                                            ],
                                            [
                                                'Ujian Akhir Semester',
                                                'Pengujian kompetensi tertentu, yang dilaksanakan secara terpadu.',
                                                '3',
                                            ],
                                        ];
                                    @endphp
                                    @foreach ($evaluations as $index => $eval)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4 text-sm">{{ $index + 1 }}</td>
                                            <td class="px-4 py-4 text-sm font-semibold text-gray-900">
                                                {{ $eval[0] }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-700">{{ $eval[1] }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-700">{{ $eval[2] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- RPS Referensi -->
                    <div class="mt-8">
                        <h4 class="text-lg font-bold text-gray-900 mb-4">RPS Referensi</h4>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">No</th>
                                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">Referensi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-4 text-sm">1</td>
                                        <td class="px-4 py-4 text-sm text-gray-700">Lumenta, R. (2019). WEBSITE STATIS
                                            Ebook dan Poster HTML - CSS di website bahasa contoh pada projek final - css
                                            (p 1)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
