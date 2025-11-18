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

            .hover-scale:hover {
                transform: scale(1.01);
            }

            .transition-smooth {
                transition: all 0.2s ease-out;
            }

            .active-channel {
                background-color: #f59e0b;
                color: white;
            }

            .status-aktif {
                background-color: #10b981;
                color: white;
            }

            .status-nonaktif {
                background-color: #ef4444;
                color: white;
            }

            .status-cutim {
                background-color: #f59e0b;
                color: white;
            }
        </style>
    </head>

    <body class="bg-gray-50">
        <!-- Top Navigation Bar -->
        <nav class="bg-white shadow-sm border-b border-gray-200 px-4 py-3">
            <div class="flex justify-between items-center">
                <!-- Left side - Logo/App Name -->
                <div class="flex items-center">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-sm"></i>
                        </div>
                        <span class="font-bold text-gray-800 text-lg">Dashboard</span>
                    </div>
                </div>

                <!-- Right side - Profile and Notifications -->
                <div class="flex items-center space-x-4">
                    <!-- Profile Picture and Name -->
                    <div class="flex items-center space-x-2">
                        <div class="flex flex-col items-end">
                            <span
                                class="text-sm font-medium text-gray-700">{{ Auth::user()->nama_lengkap ?? 'Admin' }}</span>
                            <span class="text-xs text-gray-500">Administrator</span>
                        </div>
                        <a href="/profile/admin" class="relative">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80"
                                alt="Profile Picture"
                                class="w-10 h-10 rounded-full object-cover border-2 border-yellow-400">
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="p-4 sm:p-6 bg-gray-50 min-h-screen">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-x-6 md:gap-y-6">
                <!-- Channel Selection and Dropdown -->
                <div
                    class="col-span-12 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                    <!-- Channel Buttons -->
                    <div class="flex flex-wrap gap-2">
                        <button id="mahasiswaBtn"
                            class="channel-btn bg-white text-gray-700 px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors active-channel">
                            <i class="fas fa-user-graduate mr-2"></i>Mahasiswa
                        </button>
                    </div>

                    <!-- Dropdown for switching -->
                    <div class="relative">
                        <select id="viewSelector"
                            class="bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                            <option value="/dashboard-admin/dosen">Edit Dosen</option>
                            <option value="/dashboard-admin/mahasiswa" selected>Edit Mahasiswa</option>
                            <option value="/dashboard-admin/prodi">Edit Prodi</option>
                        </select>

                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                </div>

                <!-- Data Table Section -->
                <div class="col-span-12 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <!-- Table Header with Add Button -->
                    <div class="flex justify-between items-center p-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-800" id="tableTitle">Data Mahasiswa</h2>
                        <button id="addBtn"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center">
                            <i class="fas fa-plus mr-2"></i>Tambah Data
                        </button>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        NIM</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fakultas</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Prodi</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tahun Masuk</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Jenjang</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="dataTableBody">
                                @foreach ($mhs as $m)
                                    <tr>
                                        <td>{{ $m['id'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination (if needed) -->
                    <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Menampilkan <span id="startItem">1</span> - <span id="endItem">5</span> dari <span
                                id="totalItems">20</span> data
                        </div>
                        <div class="flex space-x-2">
                            <button
                                class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button
                                class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Adding/Editing Data -->
        <div id="dataModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
            <div class="bg-white rounded-xl shadow-lg w-full max-w-md max-h-[90vh] overflow-y-auto">
                <div class="flex justify-between items-center p-4 border-b border-gray-200 sticky top-0 bg-white">
                    <h3 class="text-lg font-semibold text-gray-800" id="modalTitle">Tambah Data Mahasiswa</h3>
                    <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <form id="dataForm" class="p-4 space-y-4" method="POST" action="{{ route('mahasiswa.store') }}">
                    @csrf
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                            required>
                    </div>
                    <div>
                        <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                        <input type="text" id="nim" name="nim"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                            required>
                    </div>
                    <div>
                        <label for="fakultas" class="block text-sm font-medium text-gray-700 mb-1">Fakultas</label>
                        <select id="fakultas" name="fakultas"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                            required>
                            <option value="">Pilih Fakultas</option>
                            <option value="Fakultas Teknik">Fakultas Teknik</option>
                            <option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
                            <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                            <option value="Fakultas Hukum">Fakultas Hukum</option>
                            <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                        </select>
                    </div>
                    <div>
                        <label for="prodi" class="block text-sm font-medium text-gray-700 mb-1">Program
                            Studi</label>
                        <select id="prodi" name="prodi"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                            required>

                        </select>
                    </div>
                    <div>
                        <label for="tahunMasuk" class="block text-sm font-medium text-gray-700 mb-1">Tahun
                            Masuk</label>
                        <select id="tahunMasuk" name="tahunMasuk"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                            required>
                            <option value="">Pilih Tahun Masuk</option>
                            <!-- Options will be populated by JavaScript -->
                        </select>
                    </div>
                    <div>
                        <label for="jenjang" class="block text-sm font-medium text-gray-700 mb-1">Jenjang</label>
                        <select id="jenjang" name="jenjang"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                            required>
                            <option value="">Pilih Jenjang</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select id="status" name="status"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                            required>
                            <option value="">Pilih Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                            <option value="Cuti">Cuti</option>
                        </select>
                    </div>
                    <div class="flex justify-end space-x-3 pt-4 sticky bottom-0 bg-white pb-2">
                        <button type="button" id="cancelBtn"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            document.getElementById('viewSelector').addEventListener('change', function() {
                window.location.href = this.value;
            });

            document.addEventListener('DOMContentLoaded', function() {

                // Sample Data (sementara)
                const sampleData = {
                    mahasiswa: [{
                            id: 1,
                            nama: "Ahmad Wijaya",
                            nim: "202201001",
                            fakultas: "Fakultas Ilmu Komputer",
                            prodi: "Teknik Informatika",
                            tahunMasuk: "2022",
                            jenjang: "S1",
                            status: "Aktif"
                        },
                        {
                            id: 2,
                            nama: "Siti Rahayu",
                            nim: "202101002",
                            fakultas: "Fakultas Ilmu Komputer",
                            prodi: "Sistem Informasi",
                            tahunMasuk: "2021",
                            jenjang: "S1",
                            status: "Aktif"
                        },
                        {
                            id: 3,
                            nama: "Budi Santoso",
                            nim: "202001003",
                            fakultas: "Fakultas Teknik",
                            prodi: "Teknik Elektro",
                            tahunMasuk: "2020",
                            jenjang: "S1",
                            status: "Cuti"
                        },
                        {
                            id: 4,
                            nama: "Maya Sari",
                            nim: "201901004",
                            fakultas: "Fakultas Ekonomi",
                            prodi: "Manajemen",
                            tahunMasuk: "2019",
                            jenjang: "S1",
                            status: "Nonaktif"
                        },
                        {
                            id: 5,
                            nama: "Rizki Pratama",
                            nim: "202301005",
                            fakultas: "Fakultas Ilmu Komputer",
                            prodi: "Ilmu Komputer",
                            tahunMasuk: "2023",
                            jenjang: "S2",
                            status: "Aktif"
                        }
                    ]
                };

                // Fakul­tas → Prodi Options
                const prodiOptions = {
                    "Fakultas Teknik": ["Teknik Elektro", "Teknik Mesin", "Teknik Sipil", "Teknik Kimia",
                        "Teknik Industri"
                    ],
                    "Fakultas Ilmu Komputer": ["Teknik Informatika", "Sistem Informasi", "Ilmu Komputer",
                        "Teknologi Informasi"
                    ],
                    "Fakultas Ekonomi": ["Manajemen", "Akuntansi", "Ekonomi Pembangunan", "Ekonomi Syariah"],
                    "Fakultas Hukum": ["Ilmu Hukum", "Hukum Bisnis", "Hukum Internasional"],
                    "Fakultas Kedokteran": ["Pendidikan Dokter", "Kedokteran Gigi", "Farmasi", "Keperawatan"]
                };

                // ======================
                // VARIABLES
                // ======================

                let currentChannel = 'mahasiswa'; // ← COMMENT FIX
                let currentData = [...sampleData.mahasiswa];
                let isEditing = false;
                let editingId = null;

                const dataTableBody = document.getElementById('dataTableBody');
                const dataModal = document.getElementById('dataModal');
                const addBtn = document.getElementById('addBtn');
                const closeModal = document.getElementById('closeModal');
                const cancelBtn = document.getElementById('cancelBtn');
                const modalTitle = document.getElementById('modalTitle');
                const dataForm = document.getElementById('dataForm');

                const namaInput = document.getElementById('nama');
                const nimInput = document.getElementById('nim');
                const fakultasSelect = document.getElementById('fakultas');
                const prodiSelect = document.getElementById('prodi');
                const tahunMasukSelect = document.getElementById('tahunMasuk');
                const jenjangSelect = document.getElementById('jenjang');
                const statusSelect = document.getElementById('status');

                // ======================
                // INIT
                // ======================

                populateTahunMasukOptions();
                setupFakultasProdiListener();
                renderTable();

                // ======================
                // FUNCTIONS
                // ======================

                function populateTahunMasukOptions() {
                    const currentYear = new Date().getFullYear();
                    for (let year = currentYear; year >= currentYear - 10; year--) {
                        const opt = document.createElement('option');
                        opt.value = year;
                        opt.textContent = year;
                        tahunMasukSelect.appendChild(opt);
                    }
                }

                function setupFakultasProdiListener() {
                    fakultasSelect.addEventListener('change', function() {
                        const list = prodiOptions[this.value] || [];
                        prodiSelect.innerHTML = '<option value="">Pilih Program Studi</option>';
                        list.forEach(prodi => {
                            const opt = document.createElement('option');
                            opt.value = prodi;
                            opt.textContent = prodi;
                            prodiSelect.appendChild(opt);
                        });
                    });
                }

                function renderTable() {
                    dataTableBody.innerHTML = "";

                    if (currentData.length === 0) {
                        dataTableBody.innerHTML = `
                    <tr>
                        <td colspan="9" class="px-4 py-8 text-center text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-2"></i>
                            <p>Tidak ada data</p>
                        </td>
                    </tr>
                `;
                        return;
                    }

                    currentData.forEach(item => {
                        let statusClass =
                            item.status === "Aktif" ? "status-aktif" :
                            item.status === "Nonaktif" ? "status-nonaktif" :
                            "status-cutim";

                        const tr = document.createElement("tr");

                        tr.innerHTML = `
                    <td class="px-4 py-3">${item.id}</td>
                    <td class="px-4 py-3">${item.nama}</td>
                    <td class="px-4 py-3 font-mono">${item.nim}</td>
                    <td class="px-4 py-3">${item.fakultas}</td>
                    <td class="px-4 py-3">${item.prodi}</td>
                    <td class="px-4 py-3">${item.tahunMasuk}</td>
                    <td class="px-4 py-3">${item.jenjang}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded text-white ${statusClass}">${item.status}</span>
                    </td>
                    <td class="px-4 py-3">
                        <button class="text-blue-600 hover:underline mr-3 editBtn" data-id="${item.id}">
                            Edit
                        </button>
                        <button class="text-red-600 hover:underline deleteBtn" data-id="${item.id}">
                            Hapus
                        </button>
                    </td>
                `;

                        dataTableBody.appendChild(tr);
                    });

                    attachRowActions();
                }

                function attachRowActions() {
                    document.querySelectorAll('.editBtn').forEach(btn => {
                        btn.addEventListener('click', function() {
                            const id = parseInt(this.dataset.id);
                            openEditModal(id);
                        });
                    });

                    document.querySelectorAll('.deleteBtn').forEach(btn => {
                        btn.addEventListener('click', function() {
                            const id = parseInt(this.dataset.id);
                            currentData = currentData.filter(d => d.id !== id);
                            renderTable();
                        });
                    });
                }

                function openEditModal(id) {
                    isEditing = true;
                    editingId = id;

                    const item = currentData.find(i => i.id === id);

                    modalTitle.textContent = "Edit Data Mahasiswa";

                    namaInput.value = item.nama;
                    nimInput.value = item.nim;
                    fakultasSelect.value = item.fakultas;

                    fakultasSelect.dispatchEvent(new Event("change"));
                    prodiSelect.value = item.prodi;

                    tahunMasukSelect.value = item.tahunMasuk;
                    jenjangSelect.value = item.jenjang;
                    statusSelect.value = item.status;

                    dataModal.classList.remove("hidden");
                }

                function openAddModal() {
                    isEditing = false;
                    editingId = null;

                    modalTitle.textContent = "Tambah Data Mahasiswa";
                    dataForm.reset();
                    prodiSelect.innerHTML = '<option value="">Pilih Program Studi</option>';

                    dataModal.classList.remove("hidden");
                }

                addBtn.addEventListener("click", openAddModal);

                closeModal.addEventListener("click", () => dataModal.classList.add("hidden"));
                cancelBtn.addEventListener("click", () => dataModal.classList.add("hidden"));

                dataForm.addEventListener('submit', function(e) {
                    if (!isEditing) return; // kalau bukan edit biarkan submit ke Laravel

                    e.preventDefault();

                    const updated = currentData.find(i => i.id === editingId);

                    updated.nama = namaInput.value;
                    updated.nim = nimInput.value;
                    updated.fakultas = fakultasSelect.value;
                    updated.prodi = prodiSelect.value;
                    updated.tahunMasuk = tahunMasukSelect.value;
                    updated.jenjang = jenjangSelect.value;
                    updated.status = statusSelect.value;

                    dataModal.classList.add("hidden");
                    renderTable();
                });

            });
        </script>

    </body>
</x-app-layout>
