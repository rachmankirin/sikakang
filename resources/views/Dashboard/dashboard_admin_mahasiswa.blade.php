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
                        <span class="text-sm font-medium text-gray-700">{{ Auth::user()->nama_lengkap ?? 'Admin' }}</span>
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
            <div class="col-span-12 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                <!-- Channel Buttons -->
                <div class="flex flex-wrap gap-2">
                    <button id="mahasiswaBtn" class="channel-btn bg-white text-gray-700 px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors active-channel">
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

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>

            <!-- Data Table Section -->
            <div class="col-span-12 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <!-- Table Header with Add Button -->
                <div class="flex justify-between items-center p-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800" id="tableTitle">Data Mahasiswa</h2>
                    <button id="addBtn" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center">
                        <i class="fas fa-plus mr-2"></i>Tambah Data
                    </button>
                </div>
                
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fakultas</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prodi</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Masuk</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenjang</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="dataTableBody">
                            <!-- Data will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination (if needed) -->
                <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Menampilkan <span id="startItem">1</span> - <span id="endItem">5</span> dari <span id="totalItems">20</span> data
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding/Editing Data -->
    <div id="dataModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center p-4 border-b border-gray-200 sticky top-0 bg-white">
                <h3 class="text-lg font-semibold text-gray-800" id="modalTitle">Tambah Data Mahasiswa</h3>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="dataForm" class="p-4 space-y-4">
                <input type="hidden" id="editId" name="id">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                </div>
                <div>
                    <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                    <input type="text" id="nim" name="nim" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                </div>
                <div>
                    <label for="fakultas" class="block text-sm font-medium text-gray-700 mb-1">Fakultas</label>
                    <select id="fakultas" name="fakultas" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                        <option value="">Pilih Fakultas</option>
                        <option value="Fakultas Teknik">Fakultas Teknik</option>
                        <option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
                        <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                        <option value="Fakultas Hukum">Fakultas Hukum</option>
                        <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                    </select>
                </div>
                <div>
                    <label for="prodi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                    <select id="prodi" name="prodi" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                        <option value="">Pilih Program Studi</option>
                        <!-- Options will be populated based on selected fakultas -->
                    </select>
                </div>
                <div>
                    <label for="tahunMasuk" class="block text-sm font-medium text-gray-700 mb-1">Tahun Masuk</label>
                    <select id="tahunMasuk" name="tahunMasuk" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                        <option value="">Pilih Tahun Masuk</option>
                        <!-- Options will be populated by JavaScript -->
                    </select>
                </div>
                <div>
                    <label for="jenjang" class="block text-sm font-medium text-gray-700 mb-1">Jenjang</label>
                    <select id="jenjang" name="jenjang" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                        <option value="">Pilih Jenjang</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                        <option value="">Pilih Status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                        <option value="Cuti">Cuti</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-3 pt-4 sticky bottom-0 bg-white pb-2">
                    <button type="button" id="cancelBtn" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('viewSelector').addEventListener('change', function () {
            window.location.href = this.value;
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Sample data for demonstration
            const sampleData = {
                mahasiswa: [
                    { id: 1, nama: "Ahmad Wijaya", nim: "202201001", fakultas: "Fakultas Ilmu Komputer", prodi: "Teknik Informatika", tahunMasuk: "2022", jenjang: "S1", status: "Aktif" },
                    { id: 2, nama: "Siti Rahayu", nim: "202101002", fakultas: "Fakultas Ilmu Komputer", prodi: "Sistem Informasi", tahunMasuk: "2021", jenjang: "S1", status: "Aktif" },
                    { id: 3, nama: "Budi Santoso", nim: "202001003", fakultas: "Fakultas Teknik", prodi: "Teknik Elektro", tahunMasuk: "2020", jenjang: "S1", status: "Cuti" },
                    { id: 4, nama: "Maya Sari", nim: "201901004", fakultas: "Fakultas Ekonomi", prodi: "Manajemen", tahunMasuk: "2019", jenjang: "S1", status: "Nonaktif" },
                    { id: 5, nama: "Rizki Pratama", nim: "202301005", fakultas: "Fakultas Ilmu Komputer", prodi: "Ilmu Komputer", tahunMasuk: "2023", jenjang: "S2", status: "Aktif" }
                ],
                prodi: [
                    { id: 1, kode: "TI", nama: "Teknik Informatika", fakultas: "Fakultas Ilmu Komputer", jenjang: "S1", akreditasi: "A" },
                    { id: 2, kode: "SI", nama: "Sistem Informasi", fakultas: "Fakultas Ilmu Komputer", jenjang: "S1", akreditasi: "A" },
                    { id: 3, kode: "IK", nama: "Ilmu Komputer", fakultas: "Fakultas Ilmu Komputer", jenjang: "S2", akreditasi: "B" },
                    { id: 4, kode: "TE", nama: "Teknik Elektro", fakultas: "Fakultas Teknik", jenjang: "S1", akreditasi: "A" },
                    { id: 5, kode: "MG", nama: "Manajemen", fakultas: "Fakultas Ekonomi", jenjang: "S1", akreditasi: "A" }
                ]
            };

            // Program Studi options based on Fakultas
            const prodiOptions = {
                "Fakultas Teknik": ["Teknik Elektro", "Teknik Mesin", "Teknik Sipil", "Teknik Kimia", "Teknik Industri"],
                "Fakultas Ilmu Komputer": ["Teknik Informatika", "Sistem Informasi", "Ilmu Komputer", "Teknologi Informasi"],
                "Fakultas Ekonomi": ["Manajemen", "Akuntansi", "Ekonomi Pembangunan", "Ekonomi Syariah"],
                "Fakultas Hukum": ["Ilmu Hukum", "Hukum Bisnis", "Hukum Internasional"],
                "Fakultas Kedokteran": ["Pendidikan Dokter", "Kedokteran Gigi", "Farmasi", "Keperawatan"]
            };

            // DOM Elements
            const channelBtns = document.querySelectorAll('.channel-btn');
            const viewSelector = document.getElementById('viewSelector');
            const tableTitle = document.getElementById('tableTitle');
            const dataTableBody = document.getElementById('dataTableBody');
            const addBtn = document.getElementById('addBtn');
            const dataModal = document.getElementById('dataModal');
            const modalTitle = document.getElementById('modalTitle');
            const closeModal = document.getElementById('closeModal');
            const cancelBtn = document.getElementById('cancelBtn');
            const dataForm = document.getElementById('dataForm');
            const editId = document.getElementById('editId');
            const tahunMasukSelect = document.getElementById('tahunMasuk');
            const fakultasSelect = document.getElementById('fakultas');
            const prodiSelect = document.getElementById('prodi');

            // Current state
            let currentChannel = 'mahasiswa';
            let currentData = [...sampleData.mahasiswa];
            let isEditing = false;

            // Initialize the table
            function initializeTable() {
                populateTahunMasukOptions();
                setupFakultasProdiListener();
                renderTable();
                setupEventListeners();
            }

            // Populate tahun masuk options
            function populateTahunMasukOptions() {
                const currentYear = new Date().getFullYear();
                for (let year = currentYear; year >= currentYear - 10; year--) {
                    const option = document.createElement('option');
                    option.value = year;
                    option.textContent = year;
                    tahunMasukSelect.appendChild(option);
                }
            }

            // Setup fakultas-prodi relationship
            function setupFakultasProdiListener() {
                fakultasSelect.addEventListener('change', function() {
                    const selectedFakultas = this.value;
                    prodiSelect.innerHTML = '<option value="">Pilih Program Studi</option>';
                    
                    if (selectedFakultas && prodiOptions[selectedFakultas]) {
                        prodiOptions[selectedFakultas].forEach(prodi => {
                            const option = document.createElement('option');
                            option.value = prodi;
                            option.textContent = prodi;
                            prodiSelect.appendChild(option);
                        });
                    }
                });
            }

            // Render table with current data
            function renderTable() {
                dataTableBody.innerHTML = '';
                
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
                    const row = document.createElement('tr');
                    row.className = 'hover:bg-gray-50 transition-colors';
                    
                    // Determine status badge class
                    let statusClass = '';
                    if (item.status === 'Aktif') {
                        statusClass = 'status-aktif';
                    } else if (item.status === 'Nonaktif') {
                        statusClass = 'status-nonaktif';
                    } else if (item.status === 'Cuti') {
                        statusClass = 'status-cutim';
                    }
                    
                    row.innerHTML = `
                        <td class="px-4 py-3 text-sm text-gray-700">${item.id}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">${item.nama}</td>
                        <td class="px-4 py-3 text-sm text-gray-700 font-mono">${item.nim}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">${item.fakultas}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">${item.prodi}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">${item.tahunMasuk}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">${item.jenjang}</td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 rounded-full text-xs font-medium ${statusClass}">${item.status}</span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <button class="edit-btn text-yellow-600 hover:text-yellow-800 mr-2" data-id="${item.id}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="delete-btn text-red-600 hover:text-red-800" data-id="${item.id}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    `;
                    dataTableBody.appendChild(row);
                });
            }

            // Setup event listeners
            function setupEventListeners() {
                // Channel buttons
                channelBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const channel = this.id.replace('Btn', '');
                        switchChannel(channel);
                        
                        // Update active button
                        channelBtns.forEach(b => b.classList.remove('active-channel'));
                        this.classList.add('active-channel');
                    });
                });
                
                // Add button
                addBtn.addEventListener('click', function() {
                    isEditing = false;
                    modalTitle.textContent = 'Tambah Data Mahasiswa';
                    dataForm.reset();
                    editId.value = '';
                    dataModal.classList.remove('hidden');
                });
                
                // Close modal buttons
                closeModal.addEventListener('click', closeModalFunc);
                cancelBtn.addEventListener('click', closeModalFunc);
                
                // Form submission
                dataForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    saveData();
                });
                
                // Edit and delete buttons (delegated)
                dataTableBody.addEventListener('click', function(e) {
                    if (e.target.closest('.edit-btn')) {
                        const id = parseInt(e.target.closest('.edit-btn').getAttribute('data-id'));
                        editData(id);
                    }
                    
                    if (e.target.closest('.delete-btn')) {
                        const id = parseInt(e.target.closest('.delete-btn').getAttribute('data-id'));
                        deleteData(id);
                    }
                });
            }

            // Switch between channels
            function switchChannel(channel) {
                currentChannel = channel;
                
                // Update table title and add button text
                const titles = {
                    mahasiswa: 'Data Mahasiswa',
                    prodi: 'Data Program Studi'
                };
                tableTitle.textContent = titles[channel] || 'Data';
                
                // Update data
                currentData = [...sampleData[channel]];
                renderTable();
            }

            // Edit data
            function editData(id) {
                const item = currentData.find(d => d.id === id);
                if (!item) return;
                
                isEditing = true;
                modalTitle.textContent = 'Edit Data Mahasiswa';
                
                // Fill form with data
                document.getElementById('nama').value = item.nama;
                document.getElementById('nim').value = item.nim;
                document.getElementById('fakultas').value = item.fakultas;
                
                // Populate prodi options based on selected fakultas
                if (item.fakultas && prodiOptions[item.fakultas]) {
                    prodiSelect.innerHTML = '<option value="">Pilih Program Studi</option>';
                    prodiOptions[item.fakultas].forEach(prodi => {
                        const option = document.createElement('option');
                        option.value = prodi;
                        option.textContent = prodi;
                        if (prodi === item.prodi) {
                            option.selected = true;
                        }
                        prodiSelect.appendChild(option);
                    });
                }
                
                document.getElementById('tahunMasuk').value = item.tahunMasuk;
                document.getElementById('jenjang').value = item.jenjang;
                document.getElementById('status').value = item.status;
                editId.value = item.id;
                
                dataModal.classList.remove('hidden');
            }

            // Save data (add or edit)
            function saveData() {
                const formData = new FormData(dataForm);
                const newItem = {
                    id: isEditing ? parseInt(formData.get('id')) : currentData.length + 1,
                    nama: formData.get('nama'),
                    nim: formData.get('nim'),
                    fakultas: formData.get('fakultas'),
                    prodi: formData.get('prodi'),
                    tahunMasuk: formData.get('tahunMasuk'),
                    jenjang: formData.get('jenjang'),
                    status: formData.get('status')
                };
                
                if (isEditing) {
                    // Update existing item
                    const index = currentData.findIndex(item => item.id === newItem.id);
                    if (index !== -1) {
                        currentData[index] = newItem;
                    }
                } else {
                    // Add new item
                    currentData.push(newItem);
                }
                
                // In a real app, you would send this to a server
                
                renderTable();
                closeModalFunc();
                
                // Show success message
                alert(`Data ${isEditing ? 'diperbarui' : 'ditambahkan'}!`);
            }

            // Delete data
            function deleteData(id) {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    currentData = currentData.filter(item => item.id !== id);
                    renderTable();
                    alert('Data dihapus!');
                }
            }

            // Close modal
            function closeModalFunc() {
                dataModal.classList.add('hidden');
            }

            // Initialize the application
            initializeTable();
        });
    </script>
</body>
</x-app-layout>