<x-app-layout>
    <div class="bg-white min-h-screen p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">Jadwal Perkuliahan</h1>
                <p class="text-gray-600 mt-2">

                    @php
                        $nama = auth()->user()->nama_lengkap;
                    @endphp

                    @if ($role === 'mahasiswa')
                        {{ $mahasiswaDetail?->program_studi ? "$nama • {$mahasiswaDetail->program_studi}" : $nama }}
                    @elseif ($role === 'dosen')
                        {{ $nama }} • Dosen Pengampu
                    @else
                        Jadwal Akademik
                    @endif

                </p>
            </div>

            @if ($kelas->count() == 0)
                <div class="text-center py-12">
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Tidak Ada Jadwal</h3>
                    <p class="mt-1 text-sm text-gray-500">Belum ada jadwal tersedia untuk akun Anda.</p>
                </div>
            @else
                <!-- Filter Hari -->
                <div class="mb-6 flex justify-between items-center">
                    <select id="filterHari" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-yellow-400">
                        <option value="all">Semua Hari</option>
                        @foreach ($jadwalPerHari->keys() as $hari)
                            <option value="{{ $hari }}">{{ $hari }}</option>
                        @endforeach
                    </select>

                    <span class="text-sm font-semibold text-gray-700">
                        Total Matkul: <strong id="totalMatkul">{{ $totalMatkul }}</strong>
                    </span>
                </div>

                <!-- Schedule Group -->
                <div class="space-y-8">

                    @php
                        $colors = ['yellow', 'green', 'red', 'purple', 'orange', 'blue'];
                        $colorIndex = 0;
                    @endphp

                    @foreach ($jadwalPerHari as $hari => $kelasList)
                        <div class="day-section" data-day="{{ $hari }}">
                            <h2 class="text-xl font-bold text-gray-900 mb-3">{{ $hari }}</h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

                                @foreach ($kelasList as $kelas)
                                    @php
                                        $color = $colors[$colorIndex % count($colors)];
                                        $colorIndex++;
                                        $mk = $kelas->mataKuliah;
                                        $dosen = $kelas->dosenPengampu;
                                    @endphp

                                    <a href="{{ route('jadwal.detail.rps', urlencode($kelas->nama_kelas)) }}"
                                        class="group bg-white rounded-xl border hover:shadow-lg transition p-4">

                                        <div class="bg-{{ $color }}-50 p-3 rounded-lg mb-3">
                                            <h3 class="font-bold text-gray-900 text-lg leading-tight">
                                                {{ $mk->nama_mk }}
                                            </h3>
                                            <p class="text-xs text-gray-600">
                                                {{ $mk->kode_mk }} • {{ $mk->sks }} SKS
                                            </p>
                                        </div>

                                        <p class="text-sm text-gray-700">
                                            {{ $hari }} • {{ substr($kelas->jam_mulai, 0, 5) }} -
                                            {{ substr($kelas->jam_selesai, 0, 5) }} WIB
                                        </p>

                                        <p class="text-sm text-gray-600">Kelas {{ $kelas->nama_kelas }}</p>

                                        <p class="text-sm text-gray-600">
                                            {{ $dosen?->nama_lengkap ?? 'Belum ada dosen' }}
                                        </p>

                                    </a>
                                @endforeach

                            </div>
                        </div>
                    @endforeach

                </div>

            @endif

        </div>
    </div>

    <script>
        const filterHari = document.getElementById('filterHari');
        filterHari?.addEventListener('change', function() {
            const selected = this.value;
            const sections = document.querySelectorAll('.day-section');

            let visibleCount = 0;
            sections.forEach(sec => {
                const day = sec.dataset.day;
                const cards = sec.querySelectorAll('a');

                if (selected === 'all' || selected === day) {
                    sec.style.display = 'block';
                    visibleCount += cards.length;
                } else {
                    sec.style.display = 'none';
                }
            });

            if (selected === 'all') visibleCount = {{ $totalMatkul }};
            document.getElementById('totalMatkul').textContent = visibleCount;
        });
    </script>

</x-app-layout>
