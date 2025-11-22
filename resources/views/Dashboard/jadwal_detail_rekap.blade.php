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
                        class="text-center py-3 px-4 bg-blue-100 text-blue-700 rounded-lg font-semibold hover:bg-blue-200 transition">
                        RPS & Bahan Ajar
                    </a>
                    <a href="{{ route('jadwal.detail', urlencode($kelas->nama_kelas)) }}"
                        class="text-center py-3 px-4 bg-blue-100 text-blue-700 rounded-lg font-semibold hover:bg-blue-200 transition">
                        Jurnal Perkuliahan
                    </a>

                    <a href="{{ route('jadwal.detail.rekap', urlencode($kelas->nama_kelas)) }}"
                        class="text-center py-3 px-4 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-500 transition">
                        Rekap Jurnal Perkuliahan
                    </a>

                </div>
            </div>

            <!-- Content Section -->
            <div class="bg-blue-50 rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-6">REKAP JURNAL PERKULIAHAN</h2>

                <!-- Download Button -->
                <div class="mb-6">
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Rekap Jurnal Perkuliah (PDF)
                    </button>
                </div>

                <!-- Peserta Table -->
                <div class="bg-white rounded-lg p-6">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-900">PESERTA</h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-blue-100">
                                <tr>
                                    <th class="px-3 py-2">No</th>
                                    <th class="px-3 py-2 text-left">Nama</th>
                                    <th class="px-3 py-2 text-center">Jumlah Hadir</th>
                                    <th class="px-3 py-2 text-center">Persentase</th>

                                    @foreach ($jurnals as $jurnal)
                                        <th class="px-3 py-2 text-center">
                                            {{ \Carbon\Carbon::parse($jurnal->tanggal_perkuliahan)->format('d M Y') }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @foreach ($peserta as $i => $mhs)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-3 py-3">{{ $i + 1 }}</td>

                                        <td class="px-3 py-3">
                                            <div class="font-semibold text-gray-900">{{ $mhs->nama_lengkap }}</div>
                                            <div
                                                class="text-xs bg-blue-600 text-white px-2 py-1 rounded inline-block mt-1">
                                                {{ $mhs->nim }}
                                            </div>
                                        </td>

                                        <td class="px-3 py-3 text-center font-semibold text-gray-900">
                                            {{ $mhs->hadir }}
                                        </td>

                                        <td class="px-3 py-3 text-center">
                                            <span
                                                class="px-3 py-1 rounded-full font-semibold
                        @if ($mhs->persentase >= 80) bg-green-100 text-green-700
                        @elseif($mhs->persentase >= 50)
                            bg-yellow-100 text-yellow-700
                        @else
                            bg-red-100 text-red-700 @endif
                    ">
                                                {{ $mhs->persentase }}%
                                            </span>
                                        </td>

                                        @foreach ($jurnals as $jurnal)
                                            @php
                                                $status = $mhs->statusAbsensi[$jurnal->jurnal_id] ?? 'alpa';
                                                $badgeClass =
                                                    [
                                                        'hadir' => 'bg-green-500',
                                                        'sakit' => 'bg-purple-500',
                                                        'izin' => 'bg-yellow-500',
                                                        'alpa' => 'bg-red-500',
                                                    ][$status] ?? 'bg-gray-500';
                                            @endphp

                                            <td class="px-3 py-3 text-center">
                                                <span class="px-2 py-1 text-xs text-white rounded {{ $badgeClass }}">
                                                    {{ ucfirst($status) }}
                                                </span>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
