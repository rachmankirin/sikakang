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
            <!-- Card Kiri -->
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

            <!-- Card Kanan -->
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
                <a href="/jadwal/detail/{{ $kode ?? 'IF-402' }}/rps" 
                   class="text-center py-3 px-4 bg-blue-100 text-blue-700 rounded-lg font-semibold hover:bg-blue-200 transition">
                    RPS & Bahan Ajar
                </a>
                <a href="/jadwal/detail/{{ $kode ?? 'IF-402' }}/jurnal" 
                   class="text-center py-3 px-4 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-600 transition">
                    Jurnal Perkuliahan
                </a>
                <a href="/jadwal/detail/{{ $kode ?? 'IF-402' }}/rekap" 
                   class="text-center py-3 px-4 bg-blue-100 text-blue-700 rounded-lg font-semibold hover:bg-blue-200 transition">
                    Rekap Jurnal Perkuliahan
                </a>
            </div>
        </div>

        <!-- Content Section -->
        <div class="bg-blue-50 rounded-lg p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6">JURNAL PERKULIAHAN</h2>

            <!-- Dropdown Pilih Pertemuan -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Pertemuan Kuliah</label>
                <select id="pertemuanSelect" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Rabu, PK. 13:30 - 16:00 | Ruang Lab. Informatika</option>
                    <option value="1">Pertemuan 1 - 03 September 2025</option>
                    <option value="2">Pertemuan 2 - 10 September 2025</option>
                    <option value="3">Pertemuan 3 - 17 September 2025</option>
                </select>
            </div>

            <!-- Peserta Kuliah Section -->
            <div class="bg-white rounded-lg p-6 mb-6">
                <div class="flex items-center gap-2 mb-4">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                    </svg>
                    <h3 class="text-lg font-bold text-gray-900">PESERTA KULIAH</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-blue-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">No</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-900">Nama</th>
                                <th class="px-4 py-3 text-center text-sm font-semibold text-gray-900">Status Registrasi</th>
                                <th class="px-4 py-3 text-center text-sm font-semibold text-gray-900">Status Kehadiran</th>
                                <th class="px-4 py-3 text-center text-sm font-semibold text-gray-900">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @for($i = 1; $i <= 10; $i++)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm">{{ $i }}</td>
                                <td class="px-4 py-3">
                                    <div class="font-semibold text-gray-900">NAMA MAHASISWA</div>
                                    <div class="text-sm text-white bg-blue-600 rounded px-2 py-1 inline-block mt-1">3337240004</div>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <span class="bg-green-400 text-white text-xs font-semibold px-3 py-1 rounded">Aktif</span>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <div class="flex justify-center gap-4">
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="kehadiran_{{ $i }}" value="hadir" class="w-4 h-4 text-green-600">
                                            <span class="text-sm">Hadir</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="kehadiran_{{ $i }}" value="izin" class="w-4 h-4 text-yellow-600">
                                            <span class="text-sm">Izin</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="kehadiran_{{ $i }}" value="sakit" class="w-4 h-4 text-purple-600">
                                            <span class="text-sm">Sakit</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="kehadiran_{{ $i }}" value="tanpa_alasan" class="w-4 h-4 text-red-600" checked>
                                            <span class="text-sm">Tanpa Alasan</span>
                                        </label>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-center text-gray-500">-</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Topik Perkuliahan -->
            <div class="bg-white rounded-lg p-6 mb-6">
                <div class="flex items-center gap-2 mb-4">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                    </svg>
                    <h3 class="text-lg font-bold text-gray-900">TOPIK PERKULIAHAN</h3>
                </div>
                <p class="text-gray-600 bg-gray-50 p-4 rounded border">Konsep Dasar</p>
            </div>

            <!-- Form Section -->
            <div class="grid grid-cols-1 gap-6">
                <!-- RPS Materi -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">RPS Materi</label>
                    <select class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option>KONSEP DASAR WEB (-)</option>
                        <option>HTML</option>
                        <option>CSS</option>
                    </select>
                </div>

                <!-- Dosen -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Dosen <span class="text-red-500">*</span></label>
                    <select class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option>Yulian Arnsol, S. Kom, M. Kom (109002222040160)</option>
                    </select>
                </div>

                <!-- Validasi Button -->
                <div class="flex gap-4">
                    <button onclick="showValidasiModal()" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Validasi
                    </button>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Modal Validasi -->
<div id="validasiModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl p-8 max-w-md w-full text-center">
        <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-12 h-12 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-2">Peringatan</h3>
        <p class="text-gray-600 mb-6">Validasi jurnal perkuliahan ini?</p>
        <div class="flex gap-3">
            <button onclick="submitValidasi()" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-lg transition">
                Ya
            </button>
            <button onclick="closeValidasiModal()" class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg transition">
                Cancel
            </button>
        </div>
    </div>
</div>

<!-- Modal Success -->
<div id="successModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl p-8 max-w-md w-full text-center">
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-2">Berhasil</h3>
        <p class="text-gray-600 mb-6">Jurnal perkuliahan berhasil dibuat!</p>
        <button onclick="closeSuccessModal()" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-8 rounded-lg transition">
            OK
        </button>
    </div>
</div>

<script>
function showValidasiModal() {
    document.getElementById('validasiModal').classList.remove('hidden');
}

function closeValidasiModal() {
    document.getElementById('validasiModal').classList.add('hidden');
}

function submitValidasi() {
    closeValidasiModal();
    document.getElementById('successModal').classList.remove('hidden');
}

function closeSuccessModal() {
    document.getElementById('successModal').classList.add('hidden');
}
</script>

</x-app-layout>
