<x-app-layout>
    <div class="bg-white min-h-screen p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Verifikasi Pengajuan Surat</h1>
                    <p class="text-gray-600">Kelola pengajuan surat mahasiswa</p>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.surat.index') }}" class="px-3 py-2 rounded-lg border {{ !$status ? 'bg-yellow-100 border-yellow-300' : 'bg-white' }}">Semua</a>
                    <a href="{{ route('admin.surat.index', ['status' => 'menunggu']) }}" class="px-3 py-2 rounded-lg border {{ $status==='menunggu' ? 'bg-yellow-100 border-yellow-300' : 'bg-white' }}">Menunggu</a>
                    <a href="{{ route('admin.surat.index', ['status' => 'disetujui']) }}" class="px-3 py-2 rounded-lg border {{ $status==='disetujui' ? 'bg-yellow-100 border-yellow-300' : 'bg-white' }}">Disetujui</a>
                    <a href="{{ route('admin.surat.index', ['status' => 'ditolak']) }}" class="px-3 py-2 rounded-lg border {{ $status==='ditolak' ? 'bg-yellow-100 border-yellow-300' : 'bg-white' }}">Ditolak</a>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-4 rounded-lg border border-emerald-300 bg-emerald-50 px-4 py-3 text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">No</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Mahasiswa</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Jenis Surat</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Keperluan</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Tanggal Ajuan</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse ($pengajuan as $i => $p)
                            <tr>
                                <td class="px-4 py-3 text-sm">{{ $i + 1 }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="font-semibold">{{ $p->mahasiswa->nama_lengkap ?? '-' }}</div>
                                    <div class="text-gray-500 text-xs">NIM: {{ $p->mahasiswa->mahasiswaDetail->nim ?? '-' }}</div>
                                </td>
                                <td class="px-4 py-3 text-sm">{{ $p->jenisSurat->nama_surat ?? '-' }}</td>
                                <td class="px-4 py-3 text-sm">{{ Str::limit($p->keperluan, 60) }}</td>
                                <td class="px-4 py-3 text-sm">{{ \Carbon\Carbon::parse($p->created_at)->format('d M Y') }}</td>
                                <td class="px-4 py-3">
                                    @if($p->status_pengajuan==='menunggu')
                                        <span class="px-2 py-1 rounded-full text-xs bg-yellow-100 text-yellow-800 border border-yellow-200">Menunggu</span>
                                    @elseif($p->status_pengajuan==='disetujui')
                                        <span class="px-2 py-1 rounded-full text-xs bg-emerald-100 text-emerald-800 border border-emerald-200">Disetujui</span>
                                    @else
                                        <span class="px-2 py-1 rounded-full text-xs bg-red-100 text-red-800 border border-red-200">Ditolak</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex items-center gap-2">
                                        @if($p->status_pengajuan==='menunggu')
                                            <form action="{{ route('admin.surat.approve', $p->pengajuan_id) }}" method="POST" class="inline">
                                                @csrf
                                                <button class="px-3 py-1.5 rounded-md bg-emerald-500 text-white hover:bg-emerald-600">Setujui</button>
                                            </form>
                                            <form action="{{ route('admin.surat.reject', $p->pengajuan_id) }}" method="POST" class="inline" onsubmit="return confirm('Tolak pengajuan ini?')">
                                                @csrf
                                                <input type="hidden" name="catatan" value="Pengajuan tidak memenuhi persyaratan">
                                                <button class="px-3 py-1.5 rounded-md bg-red-500 text-white hover:bg-red-600">Tolak</button>
                                            </form>
                                        @else
                                            <a href="{{ route('surat.show', $p->pengajuan_id) }}" class="px-3 py-1.5 rounded-md bg-white border hover:bg-gray-50">Detail</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-10 text-center text-gray-500">Belum ada pengajuan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
