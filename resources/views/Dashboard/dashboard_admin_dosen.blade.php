<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Admin</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

            body {
                font-family: 'Inter', sans-serif;
            }

            .active-channel {
                background-color: #f59e0b;
                color: white;
            }
        </style>
    </head>

    <body class="bg-gray-50">

        <!-- NAVBAR -->
        <nav class="bg-white shadow-sm border-b border-gray-200 px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-sm"></i>
                    </div>
                    <span class="font-bold text-gray-800 text-lg">Dashboard</span>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="flex flex-col items-end">
                        {{-- <span class="text-sm font-medium text-gray-700">{{ Auth::user()->nama_lengkap }}</span> --}}
                        <span class="text-xs text-gray-500">Administrator</span>
                    </div>
                    <a href="/profile/admin">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=100&q=80"
                            class="w-10 h-10 rounded-full object-cover border-2 border-yellow-400">
                    </a>
                </div>
            </div>
        </nav>

        <!-- CONTENT -->
        <div class="p-4 sm:p-6 min-h-screen">

            <div class="flex justify-between items-center mb-6">
                <!-- Tabs -->
                <div class="flex gap-2">
                    <button id="magisterBtn" class="channel-btn px-4 py-2 rounded-lg bg-white border active-channel">
                        <i class="fas fa-user-graduate mr-1"></i> Magister
                    </button>
                    <button id="doktorBtn" class="channel-btn px-4 py-2 rounded-lg bg-white border">
                        <i class="fas fa-user-tie mr-1"></i> Doktor
                    </button>
                    <button id="professorBtn" class="channel-btn px-4 py-2 rounded-lg bg-white border">
                        <i class="fas fa-chalkboard-teacher mr-1"></i> Professor
                    </button>
                </div>

                <!-- Dropdown -->
                <select id="viewSelector" class="bg-white border rounded-lg px-4 py-2 focus:ring-yellow-500">
                    <option value="/dashboard-admin/dosen">Edit Dosen</option>
                    <option value="/dashboard-admin/mahasiswa">Edit Mahasiswa</option>
                    <option value="/dashboard-admin/prodi">Edit Prodi</option>
                </select>
            </div>

            <!-- TABLE -->
            <div class="bg-white rounded-xl shadow-sm border overflow-hidden">

                <div class="flex justify-between items-center p-4 border-b">
                    <h2 class="text-lg font-semibold" id="tableTitle">Data Dosen</h2>

                    <button id="addBtn"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-plus mr-2"></i> Tambah Data
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIDN</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pangkat</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keahlian
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y" id="dataTableBody">

                            @foreach ($dosen as $dsn)
                                <tr>
                                    <td class="px-4 py-3">{{ $dsn->user_id }}</td>
                                    <td class="px-4 py-3">{{ $dsn->nama_lengkap }}</td>
                                    <td class="px-4 py-3">{{ $dsn->email }}</td>
                                    <td class="px-4 py-3">{{ $dsn->dosenDetail->nidn ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $dsn->dosenDetail->jabatan_fungsional ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $dsn->dosenDetail->bidang_keahlian ?? '-' }}</td>

                                    <td class="px-4 py-3">
                                        <button class="edit-btn text-yellow-600 mr-2" data-id="{{ $dsn->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <form action="{{ route('dosen.destroy', $dsn->user_id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600" onclick="return confirm('Hapus data?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div id="dataModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center p-4 z-50">
            <div class="bg-white rounded-xl shadow-lg w-full max-w-md">

                <div class="flex justify-between items-center p-4 border-b">
                    <h3 class="text-lg font-semibold" id="modalTitle">Tambah Data</h3>
                    <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form id="dataForm" method="POST" action="{{ route('dosen.store') }}" class="p-4 space-y-4">
                    @csrf

                    <input type="hidden" name="id" id="editId">

                    <div>
                        <label class="block text-sm font-medium mb-1">Nama</label>
                        <input type="text" name="nama_lengkap" id="nama"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" name="email" id="email" class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">NIDN</label>
                        <input type="text" name="nidn" id="nidn" class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Pangkat</label>
                        <input type="text" name="pangkat" id="pangkat"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Keahlian</label>
                        <input type="text" name="keahlian" id="keahlian"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <button type="button" id="cancelBtn" class="px-4 py-2 border rounded-lg">Batal</button>

                        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg">Simpan</button>
                    </div>
                </form>

            </div>
        </div>

        <script>
            document.getElementById("viewSelector").addEventListener("change", function() {
                window.location.href = this.value;
            });

            const modal = document.getElementById("dataModal");
            const addBtn = document.getElementById("addBtn");
            const closeModal = document.getElementById("closeModal");
            const cancelBtn = document.getElementById("cancelBtn");
            const modalTitle = document.getElementById("modalTitle");

            // open modal
            addBtn.addEventListener("click", () => {
                modalTitle.textContent = "Tambah Data";
                document.getElementById("dataForm").action = "{{ route('dosen.store') }}";
                modal.classList.remove("hidden");
            });

            // close modal
            function hideModal() {
                modal.classList.add("hidden");
            }
            closeModal.onclick = hideModal;
            cancelBtn.onclick = hideModal;

            // Edit button logic
            document.querySelectorAll(".edit-btn").forEach(btn => {
                btn.addEventListener("click", async function() {
                    const id = this.dataset.id;

                    const response = await fetch(`/dashboard-admin/dosen/${id}`);
                    const data = await response.json();

                    modalTitle.textContent = "Edit Data";
                    document.getElementById("dataForm").action = `/dashboard-admin/dosen/${id}`;

                    document.getElementById("editId").value = data.id;
                    document.getElementById("nama").value = data.nama;
                    document.getElementById("email").value = data.email;
                    document.getElementById("nidn").value = data.nidn;
                    document.getElementById("pangkat").value = data.pangkat;
                    document.getElementById("keahlian").value = data.keahlian;

                    modal.classList.remove("hidden");
                });
            });
        </script>

    </body>

</x-app-layout>
