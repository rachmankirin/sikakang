<x-app-layout>
    <div class="bg-white min-h-screen p-4 sm:p-6 lg:p-8">
        <div class="max-w-4xl mx-auto">

            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center mb-4">
                    <a href="{{ route('surat.riwayat') }}" class="text-gray-500 hover:text-gray-700 mr-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Buat Pengajuan Surat</h1>
                        <p class="text-gray-600 mt-1">Isi formulir di bawah untuk mengajukan surat</p>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
                
                @if (session('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('surat.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Jenis Surat -->
                    <div>
                        <label for="jenis_surat_id" class="block text-sm font-semibold text-gray-700 mb-2">
                            Jenis Surat <span class="text-red-500">*</span>
                        </label>
                        <select name="jenis_surat_id" id="jenis_surat_id" 
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#feffc4] focus:border-[#feffc4] @error('jenis_surat_id') border-red-500 @enderror"
                            required>
                            <option value="">-- Pilih Jenis Surat --</option>
                            @foreach ($jenisSurat as $jenis)
                                <option value="{{ $jenis->jenis_surat_id }}" {{ old('jenis_surat_id') == $jenis->jenis_surat_id ? 'selected' : '' }}>
                                    {{ $jenis->nama_surat }}
                                    @if($jenis->estimasi_hari)
                                        (Est. {{ $jenis->estimasi_hari }} hari)
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        @error('jenis_surat_id')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        
                        <!-- Persyaratan Info -->
                        <div id="persyaratanInfo" class="mt-3 hidden bg-blue-50 border-l-4 border-blue-500 p-3 rounded">
                            <p class="text-sm font-semibold text-blue-700 mb-1">Persyaratan:</p>
                            <p id="persyaratanText" class="text-sm text-blue-600"></p>
                        </div>
                    </div>

                    <!-- Keperluan -->
                    <div>
                        <label for="keperluan" class="block text-sm font-semibold text-gray-700 mb-2">
                            Keperluan <span class="text-red-500">*</span>
                        </label>
                        <textarea name="keperluan" id="keperluan" rows="4"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#feffc4] focus:border-[#feffc4] @error('keperluan') border-red-500 @enderror"
                            placeholder="Jelaskan keperluan surat yang Anda ajukan..."
                            required>{{ old('keperluan') }}</textarea>
                        @error('keperluan')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Keperluan -->
                    <div>
                        <label for="tanggal_keperluan" class="block text-sm font-semibold text-gray-700 mb-2">
                            Tanggal Keperluan <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_keperluan" id="tanggal_keperluan"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#feffc4] focus:border-[#feffc4] @error('tanggal_keperluan') border-red-500 @enderror"
                            value="{{ old('tanggal_keperluan') }}"
                            required>
                        @error('tanggal_keperluan')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Tanggal saat surat dibutuhkan</p>
                    </div>

                    <!-- Info Box -->
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <div class="flex">
                            <svg class="w-5 h-5 text-yellow-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <div class="text-sm text-yellow-800">
                                <p class="font-semibold mb-1">Catatan Penting:</p>
                                <ul class="list-disc list-inside space-y-1">
                                    <li>Pastikan semua data yang diisi sudah benar</li>
                                    <li>Pengajuan akan diproses oleh Dosen Pembimbing Akademik</li>
                                    <li>Anda akan mendapat notifikasi jika pengajuan disetujui/ditolak</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-4">
                        <button type="submit"
                            class="flex-1 bg-[#feffc4] text-black font-semibold px-6 py-3 rounded-lg hover:bg-yellow-300 border border-yellow-400 transition">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Ajukan Surat
                        </button>
                        <a href="{{ route('surat.riwayat') }}"
                            class="flex-1 text-center bg-white text-gray-700 font-semibold px-6 py-3 rounded-lg border border-gray-300 hover:bg-gray-50 transition">
                            Batal
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
        // Data persyaratan untuk setiap jenis surat
        const persyaratanData = {
            @foreach ($jenisSurat as $jenis)
                '{{ $jenis->jenis_surat_id }}': '{{ $jenis->persyaratan ?? "Tidak ada persyaratan khusus" }}',
            @endforeach
        };

        // Show persyaratan when jenis surat is selected
        document.getElementById('jenis_surat_id').addEventListener('change', function() {
            const selectedId = this.value;
            const persyaratanInfo = document.getElementById('persyaratanInfo');
            const persyaratanText = document.getElementById('persyaratanText');

            if (selectedId && persyaratanData[selectedId]) {
                persyaratanText.textContent = persyaratanData[selectedId];
                persyaratanInfo.classList.remove('hidden');
            } else {
                persyaratanInfo.classList.add('hidden');
            }
        });

        // Set minimum date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal_keperluan').setAttribute('min', today);
    </script>
    @endpush
</x-app-layout>
