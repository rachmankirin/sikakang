{{-- resources/views/krs/index.blade.php --}}
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

        <!-- Stats + KRS table (sama seperti sebelumnya) -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
            <div class="bg-[#feffc4] px-6 py-4 border-b border-yellow-300">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">{{ $mahasiswaDetail->user->nama_lengkap }}</h2>
                        <p class="text-sm text-gray-700">NIM: {{ $mahasiswaDetail->nim }} | Prodi:
                            {{ $mahasiswaDetail->program_studi }}</p>
                    </div>
                    <div class="space-x-2">
                        @if ($isKrsPeriod && $krsList->count() > 0)
                            <a href="{{ route('krs.cetakPdf') }}"
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                                Cetak KRS (PDF)
                            </a>
                            <button onclick="window.print()"
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Cetak
                                (browser)</button>
                        @endif
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto p-4">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-4 py-2 text-left">No</th>
                            <th class="px-4 py-2 text-left">Kode</th>
                            <th class="px-4 py-2 text-left">Mata Kuliah</th>
                            <th class="px-4 py-2 text-left">Kelas</th>
                            <th class="px-4 py-2 text-left">Dosen</th>
                            <th class="px-4 py-2 text-left">SKS</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            @if ($isKrsPeriod)
                                <th class="px-4 py-2">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($krsList as $i => $k)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3">{{ $i + 1 }}</td>
                                <td class="px-4 py-3">{{ $k->kelas->mataKuliah->kode_mk ?? '-' }}</td>
                                <td class="px-4 py-3">
                                    <div class="font-semibold">{{ $k->kelas->mataKuliah->nama_mk ?? '-' }}</div>
                                    <div class="text-xs text-gray-500">{{ $k->kelas->hari ?? '-' }},
                                        {{ substr($k->kelas->jam_mulai ?? '', 0, 5) }} -
                                        {{ substr($k->kelas->jam_selesai ?? '', 0, 5) }}</div>
                                </td>
                                <td class="px-4 py-3">{{ $k->kelas->nama_kelas ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $k->kelas->dosenPengampu->nama_lengkap ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $k->kelas->mataKuliah->sks ?? 0 }}</td>
                                <td class="px-4 py-3"><span
                                        class="px-2 py-1 rounded bg-blue-100 text-blue-800 text-xs font-semibold">Diambil</span>
                                </td>
                                @if ($isKrsPeriod)
                                    <td class="px-4 py-3">
                                        <form action="{{ route('krs.destroy', $k->krs_id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin membatalkan mata kuliah ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600">Batalkan</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-8 text-center text-gray-500">Belum ada mata kuliah
                                    yang diambil</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Available classes --}}
        @if ($isKrsPeriod && $availableKelas->count() > 0)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b">
                    <h3 class="text-lg font-bold">Mata Kuliah Tersedia ({{ $mahasiswaDetail->program_studi }})</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($availableKelas as $kelas)
                            @php
                                $isFull = (int) $kelas->kapasitas <= 0;
                                $isTaken = in_array($kelas->mataKuliah->mk_id ?? null, $takenMkIds ?? []);
                                // check schedule conflict with student's existing KRS
$hasConflict = false;
foreach ($krsList as $kk) {
    if (
        strtolower(trim($kk->kelas->hari ?? '')) ===
            strtolower(trim($kelas->hari ?? '')) &&
        strtotime($kk->kelas->jam_mulai ?? '') < strtotime($kelas->jam_selesai ?? '') &&
        strtotime($kelas->jam_mulai ?? '') < strtotime($kk->kelas->jam_selesai ?? '')
                                    ) {
                                        $hasConflict = true;
                                        break;
                                    }
                                }
                            @endphp

                            <div class="border rounded-lg p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <div class="font-bold text-gray-900">{{ $kelas->mataKuliah->nama_mk ?? '-' }}
                                        </div>
                                        <div class="text-xs text-gray-500">Kode:
                                            {{ $kelas->mataKuliah->kode_mk ?? '-' }} • SKS:
                                            {{ $kelas->mataKuliah->sks ?? '-' }}</div>
                                    </div>
                                    <div class="text-xs bg-gray-100 px-2 py-1 rounded">{{ $kelas->kapasitas }} sisa
                                    </div>
                                </div>

                                <div class="text-sm text-gray-600 mb-3">
                                    <div class="font-semibold">{{ $kelas->nama_kelas }}</div>
                                    <div>{{ $kelas->hari ?? '-' }} • {{ substr($kelas->jam_mulai ?? '', 0, 5) }} -
                                        {{ substr($kelas->jam_selesai ?? '', 0, 5) }}</div>
                                    <div>Dosen: {{ $kelas->dosenPengampu->nama_lengkap ?? '-' }}</div>
                                </div>

                                <form action="{{ route('krs.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="kelas_id" value="{{ $kelas->kelas_id }}">

                                    @php
                                        $disable = $isFull || $isTaken || $hasConflict || $totalSks >= ($maxSks ?? 24);
                                    @endphp

                                    <button type="submit"
                                        class="w-full px-4 py-2 rounded-lg font-semibold
                                            @if ($disable) bg-gray-300 text-gray-500 cursor-not-allowed @else bg-yellow-200 hover:bg-yellow-300 @endif"
                                        @if ($disable) disabled @endif>
                                        @if ($isFull)
                                            Kapasitas Penuh
                                        @elseif($isTaken)
                                            Sudah Ambil MK Ini
                                        @elseif($hasConflict)
                                            Jadwal Bertabrakan
                                        @elseif($totalSks >= ($maxSks ?? 24))
                                            Melebihi SKS
                                        @else
                                            Ambil Mata Kuliah
                                        @endif
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    </div>
</x-app-layout>
