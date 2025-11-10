@php
    // Expecting $histories as array: [ ['semester' => '20241', 'ips' => 3.90, 'courses' => [ ['kode' => 'INF22201','name' => 'Pemrograman Web','sks' => 2,'nilai' => 92,'mutu' => 'A-'], ... ] ], ... ]
    if (!isset($histories) || empty($histories)) {
        $histories = [
            [
                'semester' => '20241',
                'ips' => 3.90,
                'courses' => [
                    ['kode' => 'INF22201', 'name' => 'Pemrograman Web', 'sks' => 2, 'nilai' => 92, 'mutu' => 'A-'],
                    ['kode' => 'INF22220', 'name' => 'Struktur Data', 'sks' => 3, 'nilai' => 90, 'mutu' => 'A'],
                    ['kode' => 'INF22230', 'name' => 'Sistem Operasi', 'sks' => 3, 'nilai' => 80, 'mutu' => 'B+'],
                ],
            ],
            [
                'semester' => '20242',
                'ips' => 3.90,
                'courses' => [
                    ['kode' => 'INF22301', 'name' => 'Basis Data', 'sks' => 3, 'nilai' => 92, 'mutu' => 'A-'],
                    ['kode' => 'INF22310', 'name' => 'Jaringan Komputer', 'sks' => 3, 'nilai' => 90, 'mutu' => 'A'],
                    ['kode' => 'INF22320', 'name' => 'Metode Numerik', 'sks' => 3, 'nilai' => 80, 'mutu' => 'B+'],
                ],
            ],
        ];
    }
@endphp

<div class="space-y-8">
    @foreach ($histories as $hist)
        <div class="bg-white border rounded-2xl overflow-hidden shadow-sm">
            <div class="flex items-center justify-between bg-yellow-300/70 px-5 py-3">
                <h3 class="font-extrabold text-gray-800">SEMESTER {{ $hist['semester'] }}</h3>
                <a href="#" class="inline-flex items-center gap-2 text-gray-700 bg-white/70 hover:bg-white transition px-3 py-1.5 rounded-md text-sm">
                    <i class="fa-solid fa-file-lines"></i> Cetak KHS
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-yellow-50">
                        <tr class="text-left text-gray-700">
                            <th class="px-4 py-2">No.</th>
                            <th class="px-4 py-2">Kode MK</th>
                            <th class="px-4 py-2">Mata Kuliah</th>
                            <th class="px-4 py-2">SKS</th>
                            <th class="px-4 py-2">Nilai</th>
                            <th class="px-4 py-2">Mutu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hist['courses'] as $i => $mk)
                            <tr class="border-b last:border-none hover:bg-yellow-50/40 transition">
                                <td class="px-4 py-2">{{ $i + 1 }}</td>
                                <td class="px-4 py-2">({{ $mk['kode'] }})</td>
                                <td class="px-4 py-2">{{ $mk['name'] }}</td>
                                <td class="px-4 py-2">{{ $mk['sks'] }}</td>
                                <td class="px-4 py-2">{{ $mk['nilai'] }}</td>
                                <td class="px-4 py-2">{{ $mk['mutu'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-yellow-100 font-semibold">
                            <td class="px-4 py-2" colspan="3">Total SKS:</td>
                            <td class="px-4 py-2">
                                {{ collect($hist['courses'])->sum('sks') }}
                            </td>
                            <td class="px-4 py-2 text-right" colspan="2">IPS: {{ number_format($hist['ips'], 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endforeach
</div>

