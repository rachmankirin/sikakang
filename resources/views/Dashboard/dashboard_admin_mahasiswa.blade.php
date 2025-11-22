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

            .status-cuti {
                background-color: #f59e0b;
                color: white;
            }

            .status-lulus {
                background-color: #3b82f6;
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
                            <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</span>
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
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="dataTableBody">
                                @forelse ($mhs as $mahasiswa)
                                    @php $detail = $mahasiswa->mahasiswaDetail; @endphp
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-4 py-3">{{ $mahasiswa->user_id }}</td>
                                        <td class="px-4 py-3">{{ $mahasiswa->nama_lengkap }}</td>
                                        <td class="px-4 py-3 font-mono">{{ $detail->nim ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $detail->fakultas ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $detail->program_studi ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $detail->angkatan ?? '-' }}</td>
                                        <td class="px-4 py-3">-</td>
                                        <td class="px-4 py-3">
                                            @if ($detail && $detail->status_mahasiswa)
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold rounded-full status-{{ $detail->status_mahasiswa }}">
                                                    {{ ucfirst($detail->status_mahasiswa) }}
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 flex items-center space-x-2">
                                            <button
                                                class="editBtn text-blue-500 hover:text-blue-700 transition-colors"
                                                data-id="{{ $mahasiswa->user_id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button
                                                class="deleteBtn text-red-500 hover:text-red-700 transition-colors"
                                                data-id="{{ $mahasiswa->user_id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-4 text-gray-500">Tidak ada data
                                            mahasiswa.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="p-4 bg-gray-50 border-t border-gray-200">
                        {{ $mhs->links() }}
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
                <form id="dataForm" class="p-4 space-y-4" method="POST">
                    @csrf
                    <div id="formMethod" style="display: none;"></div>
                    
                    <div>
                        <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                            required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                            required>
                    </div>
                    <div id="passwordField">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password" name="password"
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
                        <label for="program_studi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                        <select id="program_studi" name="program_studi"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                            required>
                        </select>
                    </div>
                    <div>
                        <label for="angkatan" class="block text-sm font-medium text-gray-700 mb-1">Tahun Masuk</label>
                        <select id="angkatan" name="angkatan"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                            required>
                            <option value="">Pilih Tahun Masuk</option>
                            <!-- Options will be populated by JavaScript -->
                        </select>
                    </div>
                    <div>
                        <label for="status_mahasiswa" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select id="status_mahasiswa" name="status_mahasiswa"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                            required>
                            <option value="">Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                            <option value="cuti">Cuti</option>
                            <option value="lulus">Lulus</option>
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

        <!-- Success Message -->
        @if(session('success'))
        <div id="successMessage" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
        @endif

        <script>
            document.getElementById('viewSelector').addEventListener('change', function() {
                window.location.href = this.value;
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Fakultas → Prodi Options
                const prodiOptions = {
                    "Fakultas Teknik": ["Teknik Elektro", "Teknik Mesin", "Teknik Sipil", "Teknik Kimia", "Informatika"],
                    "Fakultas Ilmu Komputer": ["Teknik Informatika", "Sistem Informasi", "Ilmu Komputer", "Teknologi Informasi"],
                    "Fakultas Ekonomi": ["Manajemen", "Akuntansi", "Ekonomi Pembangunan", "Ekonomi Syariah"],
                    "Fakultas Hukum": ["Ilmu Hukum", "Hukum Bisnis", "Hukum Internasional"],
                    "Fakultas Kedokteran": ["Pendidikan Dokter", "Kedokteran Gigi", "Farmasi", "Keperawatan"]
                };

                // ======================
                // VARIABLES
                // ======================

                let isEditing = false;
                let editingId = null;

                const dataTableBody = document.getElementById('dataTableBody');
                const dataModal = document.getElementById('dataModal');
                const addBtn = document.getElementById('addBtn');
                const closeModal = document.getElementById('closeModal');
                const cancelBtn = document.getElementById('cancelBtn');
                const modalTitle = document.getElementById('modalTitle');
                const dataForm = document.getElementById('dataForm');
                const formMethod = document.getElementById('formMethod');
                const passwordField = document.getElementById('passwordField');

                const nameInput = document.getElementById('nama_lengkap');
                const emailInput = document.getElementById('email');
                const passwordInput = document.getElementById('password');
                const nimInput = document.getElementById('nim');
                const fakultasSelect = document.getElementById('fakultas');
                const prodiSelect = document.getElementById('program_studi');
                const angkatanSelect = document.getElementById('angkatan');
                const statusSelect = document.getElementById('status_mahasiswa');

                // ======================
                // INIT
                // ======================

                populateTahunMasukOptions();
                setupFakultasProdiListener();
                setupEventListeners();

                // ======================
                // FUNCTIONS
                // ======================

                function populateTahunMasukOptions() {
                    const currentYear = new Date().getFullYear();
                    for (let year = currentYear; year >= currentYear - 10; year--) {
                        const opt = document.createElement('option');
                        opt.value = year;
                        opt.textContent = year;
                        angkatanSelect.appendChild(opt);
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

                function setupEventListeners() {
                    // Add button
                    addBtn.addEventListener("click", openAddModal);

                    // Modal controls
                    closeModal.addEventListener("click", () => dataModal.classList.add("hidden"));
                    cancelBtn.addEventListener("click", () => dataModal.classList.add("hidden"));

                    // Edit buttons
                    document.querySelectorAll('.editBtn').forEach(btn => {
                        btn.addEventListener('click', function() {
                            const id = this.dataset.id;
                            openEditModal(id);
                        });
                    });

                    // Delete buttons
                    document.querySelectorAll('.deleteBtn').forEach(btn => {
                        btn.addEventListener('click', function() {
                            const id = this.dataset.id;
                            if (confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')) {
                                deleteMahasiswa(id);
                            }
                        });
                    });

                    // Form submission
                    dataForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        if (isEditing) {
                            updateMahasiswa();
                        } else {
                            createMahasiswa();
                        }
                    });
                }

                function openAddModal() {
                    isEditing = false;
                    editingId = null;

                    modalTitle.textContent = "Tambah Data Mahasiswa";
                    dataForm.reset();
                    dataForm.action = "{{ route('mahasiswa.store') }}";
                    formMethod.innerHTML = '';
                    passwordField.style.display = 'block';
                    passwordInput.required = true;
                    prodiSelect.innerHTML = '<option value="">Pilih Program Studi</option>';

                    dataModal.classList.remove("hidden");
                }

                async function openEditModal(id) {
                    try {
                        isEditing = true;
                        editingId = id;

                        // Fetch mahasiswa data
                        const response = await fetch(/dashboard-admin/mahasiswa/${id}/edit);
                        const data = await response.json();

                        modalTitle.textContent = "Edit Data Mahasiswa";
                        
                        // Set form values
                        nameInput.value = data.user.nama_lengkap;
                        emailInput.value = data.user.email;
                        nimInput.value = data.detail.nim || '';
                        fakultasSelect.value = data.detail.fakultas || '';
                        
                        // Trigger program studi update
                        fakultasSelect.dispatchEvent(new Event("change"));
                        setTimeout(() => {
                            prodiSelect.value = data.detail.program_studi || '';
                        }, 100);
                        
                        angkatanSelect.value = data.detail.angkatan || '';
                        statusSelect.value = data.detail.status_mahasiswa || '';

                        // Update form action and method
                        dataForm.action = /dashboard-admin/mahasiswa/${id};
                        formMethod.innerHTML = '@method("PUT")';
                        passwordField.style.display = 'none';
                        passwordInput.required = false;

                        dataModal.classList.remove("hidden");
                    } catch (error) {
                        console.error('Error fetching mahasiswa data:', error);
                        alert('Gagal memuat data mahasiswa');
                    }
                }

                async function createMahasiswa() {
                    try {
                        const formData = new FormData(dataForm);
                        const response = await fetch("{{ route('mahasiswa.store') }}", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                            body: formData
                        });

                        if (response.ok) {
                            window.location.reload();
                        } else {
                            const error = await response.json();
                            alert('Gagal menambah mahasiswa: ' + (error.message || 'Terjadi kesalahan'));
                        }
                    } catch (error) {
                        console.error('Error creating mahasiswa:', error);
                        alert('Gagal menambah mahasiswa');
                    }
                }

                async function updateMahasiswa() {
                    try {
                        const formData = new FormData(dataForm);
                        formData.append('_method', 'PUT');

                        const response = await fetch(/dashboard-admin/mahasiswa/${editingId}, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                            body: formData
                        });

                        if (response.ok) {
                            window.location.reload();
                        } else {
                            const error = await response.json();
                            alert('Gagal mengupdate mahasiswa: ' + (error.message || 'Terjadi kesalahan'));
                        }
                    } catch (error) {
                        console.error('Error updating mahasiswa:', error);
                        alert('Gagal mengupdate mahasiswa');
                    }
                }

                async function deleteMahasiswa(id) {
                    try {
                        const response = await fetch(/dashboard-admin/mahasiswa/${id}, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                        });

                        if (response.ok) {
                            window.location.reload();
                        } else {
                            const error = await response.json();
                            alert('Gagal menghapus mahasiswa: ' + (error.message || 'Terjadi kesalahan'));
                        }
                    } catch (error) {
                        console.error('Error deleting mahasiswa:', error);
                        alert('Gagal menghapus mahasiswa');
                    }
                }

                // Auto-hide success message
                const successMessage = document.getElementById('successMessage');
                if (successMessage) {
                    setTimeout(() => {
                        successMessage.style.display = 'none';
                    }, 3000);
                }
            });
        </script>

    </body>
</x-app-layout>