@php
    // Expecting $registrations: [ ['semester'=>'20241','semester_ke'=>1,'jumlah'=>4500000,'tanggal_bayar'=>'2024-07-27 18:13:47','metode'=>'Virtual Account','status'=>'Lunas'], ... ]
    if (!isset($registrations) || empty($registrations)) {
        $registrations = [
            ['semester' => '20241', 'semester_ke' => 1, 'jumlah' => 4500000, 'tanggal_bayar' => '2024-07-27 18:13:47', 'metode' => 'Virtual Account', 'status' => 'Lunas'],
            ['semester' => '20242', 'semester_ke' => 2, 'jumlah' => 4500000, 'tanggal_bayar' => '2025-01-01 15:01:21', 'metode' => 'Virtual Account', 'status' => 'Lunas'],
            ['semester' => '20251', 'semester_ke' => 3, 'jumlah' => 4500000, 'tanggal_bayar' => '2025-07-31 19:33:27', 'metode' => 'Virtual Account', 'status' => 'Lunas'],
        ];
    }
    $fmt = fn($n) => 'Rp ' . number_format($n, 0, ',', '.');
@endphp

<div class="bg-white border rounded-2xl overflow-hidden shadow-sm">
    <div class="flex items-center justify-between bg-yellow-50 px-5 py-3">
        <h3 class="font-extrabold text-gray-800">Riwayat Registrasi</h3>
        <a href="#" class="inline-flex items-center gap-2 text-gray-700 bg-yellow-100 hover:bg-yellow-200 transition px-3 py-1.5 rounded-md text-sm">
            <i class="fa-solid fa-file-invoice"></i> Download Bukti
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-yellow-100 text-gray-700">
                <tr class="text-left">
                    <th class="px-4 py-2">Semester</th>
                    <th class="px-4 py-2">Semester</th>
                    <th class="px-4 py-2">Nominal</th>
                    <th class="px-4 py-2">Tanggal Bayar</th>
                    <th class="px-4 py-2">Metode Pembayaran</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrations as $r)
                    <tr class="border-b last:border-none hover:bg-yellow-50/40 transition">
                        <td class="px-4 py-2">{{ $r['semester'] }}</td>
                        <td class="px-4 py-2">{{ $r['semester_ke'] }}</td>
                        <td class="px-4 py-2">{{ $fmt($r['jumlah']) }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($r['tanggal_bayar'])->format('d M Y H:i:s') }}</td>
                        <td class="px-4 py-2">{{ $r['metode'] }}</td>
                        <td class="px-4 py-2">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">{{ $r['status'] }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

