<x-app-layout>
    @section('title', 'Hasil Studi')

    <div class="space-y-6 bg-gradient-to-br from-white-50 via-white to-white-100 p-4 sm:p-6 rounded-3xl shadow-lg border border-yellow-100">
        <!-- Hero -->
        <div class="relative overflow-hidden rounded-2xl bg-white/90 border border-yellow-100 shadow-lg p-5 sm:p-6">
            <div class="absolute inset-0 opacity-30"
                 style="background: radial-gradient(circle at 18% 30%, rgba(255,224,94,0.35), transparent 35%), radial-gradient(circle at 82% 30%, rgba(255,224,94,0.25), transparent 35%), radial-gradient(circle at 50% 90%, rgba(255,224,94,0.2), transparent 40%);">
            </div>
            <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <p class="text-xs uppercase tracking-[0.25em] text-yellow-700/80 mb-1">Rekap Nilai</p>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Hasil Studi</h1>
                    <p class="text-gray-600 mt-1">Pantau IPS, IPK, dan detail nilai per mata kuliah dengan tampilan yang rapi.</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <button class="flex items-center gap-2 px-4 py-2 rounded-xl bg-yellow-500 text-white font-semibold shadow hover:shadow-md transform-gpu transition-transform duration-200 hover:scale-[1.02]">
                        <i class="fa-solid fa-calculator"></i> Hitung IPS
                    </button>
                    <button class="flex items-center gap-2 px-4 py-2 rounded-xl bg-white text-yellow-700 border border-yellow-200 font-semibold shadow hover:shadow-md transform-gpu transition-transform duration-200 hover:scale-[1.02]">
                        <i class="fa-solid fa-print"></i> Cetak KHS
                    </button>
                </div>
            </div>
        </div>

        <!-- Stat Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            @php
                $stats = [
                    ['label' => 'Total SKS Semester ini', 'value' => '24', 'sub' => 'SKS yang diambil', 'icon' => 'fa-layer-group'],
                    ['label' => 'Indeks Prestasi Semester', 'value' => '3.80', 'sub' => 'IP Semester ini', 'icon' => 'fa-chart-line'],
                    ['label' => 'Indeks Prestasi Kumulatif', 'value' => '3.90', 'sub' => 'IPK Saat ini', 'icon' => 'fa-graduation-cap'],
                ];
            @endphp
            @foreach ($stats as $s)
                <div class="relative overflow-hidden bg-white rounded-2xl border border-yellow-100 shadow-sm p-4 flex items-center gap-3 transform-gpu transition-transform duration-200 hover:scale-[1.02] hover:shadow-lg">
                    <div class="w-12 h-12 rounded-xl bg-yellow-100 text-yellow-700 grid place-content-center text-lg">
                        <i class="fa-solid {{ $s['icon'] }}"></i>
                    </div>
                    <div>
                        <p class="text-xs uppercase tracking-wide text-gray-500">{{ $s['label'] }}</p>
                        <p class="text-2xl font-extrabold text-gray-900 leading-tight">{{ $s['value'] }}</p>
                        <p class="text-xs text-gray-500">{{ $s['sub'] }}</p>
                    </div>
                    <div class="absolute -right-6 -top-6 w-20 h-20 bg-yellow-50 rounded-full blur-2xl pointer-events-none"></div>
                </div>
            @endforeach
        </div>

        <!-- KHS -->
        <div class="bg-white rounded-2xl border border-yellow-100 shadow-sm overflow-hidden transform-gpu transition-transform duration-200 hover:scale-[1.01] hover:shadow-lg">
            <div class="px-5 py-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 bg-yellow-50 border-b border-yellow-100">
                <div>
                    <p class="text-xs uppercase tracking-wide text-yellow-700/80 font-semibold">Kartu Hasil Studi</p>
                    <p class="text-gray-800 font-bold text-lg">Nama Mahasiswa</p>
                    <p class="text-gray-500 text-sm">NIM: 3337240077</p>
                </div>
                <div class="flex gap-2">
                    <span class="px-3 py-1 rounded-full bg-white text-yellow-700 border border-yellow-200 text-xs font-semibold">Semester Genap</span>
                    <span class="px-3 py-1 rounded-full bg-white text-yellow-700 border border-yellow-200 text-xs font-semibold">2024/2025</span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs uppercase bg-yellow-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Kode Jadwal</th>
                            <th class="px-4 py-3">Mata Kuliah</th>
                            <th class="px-4 py-3">Dosen</th>
                            <th class="px-4 py-3 text-center">Nilai</th>
                            <th class="px-4 py-3 text-center">Mutu</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-yellow-50">
                        @php
                            $rows = [
                                ['kode' => 'INF622201', 'mk' => 'Pemrograman Web', 'sks' => 3, 'dosen' => 'Yulian Ansore', 'nilai' => 90, 'mutu' => 'A'],
                                ['kode' => 'INF622202', 'mk' => 'Basis Data', 'sks' => 3, 'dosen' => 'Yulian Ansore', 'nilai' => 88, 'mutu' => 'A-'],
                                ['kode' => 'INF622203', 'mk' => 'Sistem Operasi', 'sks' => 3, 'dosen' => 'Yulian Ansore', 'nilai' => 82, 'mutu' => 'B+'],
                            ];
                        @endphp
                        @foreach ($rows as $i => $r)
                            <tr class="hover:bg-yellow-50 transition-colors">
                                <td class="px-4 py-3">{{ $i + 1 }}</td>
                                <td class="px-4 py-3 font-semibold text-gray-800">{{ $r['kode'] }}</td>
                                <td class="px-4 py-3">
                                    <div class="font-semibold text-gray-900">{{ $r['mk'] }}</div>
                                    <span class="inline-flex mt-1 px-2 py-0.5 bg-yellow-100 text-yellow-800 text-xs font-semibold rounded-full">{{ $r['sks'] }} SKS</span>
                                </td>
                                <td class="px-4 py-3 text-gray-700">{{ $r['dosen'] }}</td>
                                <td class="px-4 py-3 text-center font-semibold text-gray-900">{{ $r['nilai'] }}</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800 border border-green-200">{{ $r['mutu'] }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Keterangan Mutu -->
        <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_0.8fr] gap-4">
            <div class="bg-white rounded-2xl border border-yellow-100 shadow-sm p-5 transform-gpu transition-transform duration-200 hover:scale-[1.01] hover:shadow-lg">
                <div class="flex items-center gap-2 mb-3">
                    <i class="fa-solid fa-scale-balanced text-yellow-600"></i>
                    <h3 class="text-lg font-semibold text-gray-900">Keterangan Mutu</h3>
                </div>
                @php
                    $mutu = [
                        ['A', '4.00'], ['A-', '3.75'], ['B+', '3.50'], ['B', '3.00'],
                        ['B-', '2.75'], ['C+', '2.30'], ['C', '2.00'], ['D', '1.00'],
                    ];
                @endphp
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-sm">
                    @foreach ($mutu as [$huruf, $angka])
                        <div class="px-3 py-2 rounded-lg bg-yellow-50 border border-yellow-100 text-gray-800 font-semibold flex items-center justify-between">
                            <span>{{ $huruf }}</span>
                            <span class="text-gray-500">{{ $angka }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-gradient-to-br from-yellow-400 via-amber-300 to-yellow-400 rounded-2xl shadow-lg p-6 text-gray-900 transform-gpu transition-transform duration-200 hover:scale-[1.01] hover:shadow-xl">
                <div class="flex items-center gap-2 mb-2">
                    <i class="fa-solid fa-sparkles"></i>
                    <h3 class="text-lg font-extrabold">Kata Penyemangat</h3>
                </div>
                <p class="text-sm leading-relaxed">Selamat atas pencapaian akademik Anda! Terus pertahankan prestasi, kelola waktu dengan bijak, dan raih target lebih tinggi di semester berikutnya.</p>
            </div>
        </div>
    </div>
</x-app-layout>
