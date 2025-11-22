<x-app-layout>
    <div class="bg-white min-h-screen p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">

            <!-- Breadcrumb -->
            <nav class="mb-6 text-sm text-gray-600">
                <span>Perkuliahan</span>
                <span class="mx-2">›</span>
                <a href="{{ route('jadwal.index') }}" class="text-blue-600 hover:underline">Jadwal Kuliah</a>
                <span class="mx-2">›</span>
                <span class="text-gray-900 font-semibold">Detail</span>
            </nav>

            <!-- Back Button -->
            <a href="{{ route('jadwal.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900 mb-6">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali
            </a>

            <h1 class="text-3xl font-bold text-gray-900 mb-4">Detail Jadwal</h1>

            <!-- Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Card Kiri -->
                <div class="bg-white border-2 border-blue-400 rounded-lg p-6">
                    <div class="space-y-3">
                        <div>
                            <p class="text-sm text-gray-600">Kode Jadwal</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $kelas->id ?? $kelas->kelas_id }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Mata Kuliah</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $kelas->mataKuliah->nama_mk ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Kelas</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $kelas->nama_kelas ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card Kanan -->
                <div class="bg-white border-2 border-blue-400 rounded-lg p-6">
                    <div class="space-y-3">
                        <div>
                            <p class="text-sm text-gray-600">Dosen</p>
                            <p class="text-lg font-semibold text-gray-900">
                                {{ $kelas->dosenPengampu->nama_lengkap ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Hari & Waktu</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $kelas->hari ?? '-' }} -
                                {{ substr($kelas->jam_mulai ?? '', 0, 5) }} /
                                {{ substr($kelas->jam_selesai ?? '', 0, 5) }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Pertemuan Terlaksana</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $jurnals->count() }} Kali</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Navigation -->
            @php
                $tabBase = url('/jadwal/detail/' . ($idKelas ?? ($kelas->id ?? $kelas->mataKuliah->kode_mk)));
            @endphp
            <div class="mb-6">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <a href="{{ $tabBase . '/rps' }}"
                        class="text-center py-3 px-4 bg-blue-100 text-blue-700 rounded-lg font-semibold hover:bg-blue-200 transition">
                        RPS & Bahan Ajar
                    </a>
                    <a href="{{ $tabBase }}"
                        class="text-center py-3 px-4 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-600 transition">
                        Jurnal Perkuliahan
                    </a>
                    <a href="{{ $tabBase . '/rekap' }}"
                        class="text-center py-3 px-4 bg-blue-100 text-blue-700 rounded-lg font-semibold hover:bg-blue-200 transition">
                        Rekap Jurnal Perkuliahan
                    </a>
                </div>
            </div>

            <!-- Content Section -->
            <div class="bg-blue-50 rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-900 mb-6">JURNAL PERKULIAHAN</h2>

                <!-- Pilih Pertemuan -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Pertemuan Kuliah</label>
                    <select id="pertemuanSelect" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg">
                        <option value="">-- Pilih Pertemuan --</option>
                        @foreach ($jurnals as $jr)
                            <option value="{{ $jr->jurnal_id }}"
                                {{ optional($selectedJurnal)->jurnal_id == $jr->jurnal_id ? 'selected' : '' }}>
                                Pertemuan {{ $jr->pertemuan_ke }} -
                                {{ \Carbon\Carbon::parse($jr->tanggal_perkuliahan)->format('d M Y') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Jika dosen, form untuk tambah pertemuan -->
                @if ($isDosen)
                    <button onclick="openTambahModal()"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 mb-4">
                        + Tambah Pertemuan
                    </button>
                @endif


                <!-- Peserta Kuliah Section -->
                <div class="bg-white rounded-lg p-6 mb-6">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-900">PESERTA KULIAH</h3>
                    </div>

                    <div class="overflow-x-auto">
                        @if ($peserta->isEmpty())
                            <div class="p-4 text-sm text-gray-600">Tidak ada peserta untuk kelas ini.</div>
                        @else
                            @if ($isDosen)
                                <form
                                    action="{{ route('jurnal.absensi.store', optional($selectedJurnal)->jurnal_id ?? 0) }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="POST">
                            @endif

                            <table class="w-full">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">No</th>
                                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">Nama</th>
                                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-900">Status
                                            Registrasi</th>
                                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-900">Status
                                            Kehadiran</th>
                                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-900">Keterangan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($peserta as $userId => $mhs)
                                        @php
                                            $absen = $absensiMap[$userId] ?? null;
                                            $checked = $absen->status_kehadiran ?? 'alpa';
                                        @endphp
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-3 text-sm">{{ $loop->iteration }}</td>

                                            <td class="px-4 py-3">
                                                <div class="font-semibold text-gray-900">
                                                    {{ $mhs->nama ?? 'Nama Tidak Ada' }}

                                                </div>
                                                <div
                                                    class="text-sm text-white bg-blue-600 rounded px-2 py-1 inline-block mt-1">
                                                    {{ $mhs->nim ?? '-' }}
                                                </div>
                                            </td>

                                            <td class="px-4 py-3 text-center">
                                                <span
                                                    class="bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded">Aktif</span>
                                            </td>

                                            <td class="px-4 py-3 text-center">
                                                <div class="flex justify-center gap-4">
                                                    @foreach (['hadir' => 'Hadir', 'izin' => 'Izin', 'sakit' => 'Sakit', 'alpa' => 'Tanpa Alasan'] as $key => $label)
                                                        <label class="flex items-center gap-2">
                                                            <input type="hidden"
                                                                name="mahasiswa_user_id[{{ $userId }}]"
                                                                value="{{ $userId }}">
                                                            <input type="radio"
                                                                name="status_kehadiran[{{ $userId }}]"
                                                                value="{{ $key }}" class="w-4 h-4"
                                                                {{ $checked == $key ? 'checked' : '' }}
                                                                {{ $isDosen ? '' : 'disabled' }}>
                                                            <span class="text-sm">{{ $label }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                            @if ($isDosen)
                                <div class="mt-4 text-right">
                                    <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded">Simpan
                                        Absensi</button>
                                </div>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>

                <!-- Topik Perkuliahan -->
                <div class="bg-white rounded-lg p-6 mb-6">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-900">TOPIK PERKULIAHAN</h3>
                    </div>
                    <p class="text-gray-600 bg-gray-50 p-4 rounded border">
                        {{ optional($selectedJurnal)->materi ?? 'Belum ada materi' }}</p>
                </div>

                <!-- RPS preview (minimal) -->
                <div class="bg-white rounded-lg p-6 mb-6">
                    <h3 class="font-bold mb-3">RPS & Bahan Ajar</h3>
                    <p class="text-sm text-gray-600">Daftar RPS / bahan ajar belum tersedia — akan menampilkan dokumen
                        dan tautan.</p>
                    <p class="text-xs text-gray-400 mt-2">(Untuk sekarang tab RPS gunakan route:
                        /jadwal/detail/{id}/rps )</p>
                </div>

            </div>
        </div>
    </div>

    <!-- Modals (validasi) only show for dosen -->
    @if ($isDosen)
        <div id="validasiModal"
            class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl p-8 max-w-md w-full text-center">
                <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01">
                        </path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Peringatan</h3>
                <p class="text-gray-600 mb-6">Validasi jurnal perkuliahan ini?</p>
                <div class="flex gap-3">
                    <button onclick="document.getElementById('validasiModal').classList.add('hidden')"
                        class="flex-1 bg-purple-600 text-white py-3 rounded">Ya</button>
                    <button onclick="document.getElementById('validasiModal').classList.add('hidden')"
                        class="flex-1 bg-red-500 text-white py-3 rounded">Batal</button>
                </div>
            </div>
        </div>
    @endif

    <script>
        document.getElementById('pertemuanSelect')?.addEventListener('change', function() {
            const val = this.value;
            if (!val) return;
            const base = "{{ url('/jadwal/detail/' . ($idKelas ?? ($kelas->id ?? $kelas->kelas_id))) }}";
            window.location.href = base + '?jurnal=' + val;
        });

        function showValidasiModal() {
            document.getElementById('validasiModal')?.classList.remove('hidden');
        }
    </script>

    @if ($isDosen)
        <div id="tambahModal"
            class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl p-6 w-full max-w-lg">
                <h2 class="text-xl font-bold mb-4 text-gray-900">Tambah Pertemuan</h2>

                <form action="{{ route('jurnal.store', $idKelas ?? ($kelas->id ?? $kelas->kelas_id)) }}"
                    method="POST">
                    @csrf

                    <label class="block text-sm font-semibold mb-1">Pertemuan Ke</label>
                    <input name="pertemuan_ke" type="number" class="w-full border px-3 py-2 rounded mb-3" required>

                    <label class="block text-sm font-semibold mb-1">Tanggal Perkuliahan</label>
                    <input name="tanggal_perkuliahan" type="date" class="w-full border px-3 py-2 rounded mb-3"
                        required>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-semibold mb-1">Jam Mulai</label>
                            <input name="jam_mulai" type="time" class="w-full border px-3 py-2 rounded mb-3"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">Jam Selesai</label>
                            <input name="jam_selesai" type="time" class="w-full border px-3 py-2 rounded mb-3"
                                required>
                        </div>
                    </div>

                    <label class="block text-sm font-semibold mb-1">Materi (Opsional)</label>
                    <textarea name="materi" class="w-full border px-3 py-2 rounded mb-3"></textarea>

                    <label class="block text-sm font-semibold mb-1">Metode Pembelajaran (Opsional)</label>
                    <textarea name="metode_pembelajaran" class="w-full border px-3 py-2 rounded mb-4"></textarea>

                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeTambahModal()"
                            class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                            Batal
                        </button>

                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    @endif
    <script>
        function openTambahModal() {
            document.getElementById('tambahModal').classList.remove('hidden');
        }

        function closeTambahModal() {
            document.getElementById('tambahModal').classList.add('hidden');
        }
    </script>

</x-app-layout>
