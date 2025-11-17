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
                    <button id="magisterBtn" class="channel-btn bg-white text-gray-700 px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors active-channel">
                        <i class="fas fa-user-graduate mr-2"></i>Magister
                    </button>
                    <button id="doktorBtn" class="channel-btn bg-white text-gray-700 px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-user-tie mr-2"></i>Doktor
                    </button>
                    <button id="professorBtn" class="channel-btn bg-white text-gray-700 px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-chalkboard-teacher mr-2"></i>Professor
                    </button>
                </div>
                
                <!-- Dropdown for switching -->
                <div class="relative">
                    <select id="viewSelector" 
                        class="bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                        <option value="/dashboard-admin/dosen">Edit Dosen</option>
                        <option value="/dashboard-admin/mahasiswa">Edit Mahasiswa</option>
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
                    <h2 class="text-lg font-semibold text-gray-800" id="tableTitle">Data Magister</h2>
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
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIP/NIK</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIP/NIDN</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pangkat</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan</th>
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
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md">
            <div class="flex justify-between items-center p-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800" id="modalTitle">Tambah Data</h3>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="dataForm" class="p-4 space-y-4">
                <input type="hidden" id="editId" name="id">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input type="text" id="nama" name="nama" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                </div>
                <div>
                    <label for="nipNik" class="block text-sm font-medium text-gray-700 mb-1">NIP/NIK</label>
                    <input type="text" id="nipNik" name="nipNik" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                </div>
                <div>
                    <label for="nipNidn" class="block text-sm font-medium text-gray-700 mb-1">NIP/NIDN</label>
                    <input type="text" id="nipNidn" name="nipNidn" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                </div>
                <div>
                    <label for="pangkat" class="block text-sm font-medium text-gray-700 mb-1">Pangkat</label>
                    <input type="text" id="pangkat" name="pangkat" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                </div>
                <div>
                    <label for="jabatan" class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                    <input type="text" id="jabatan" name="jabatan" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                </div>
                <div class="flex justify-end space-x-3 pt-4">
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
                magister: [
                    { id: 1, nama: "Dr. Ahmad Wijaya", nipNik: "198203102005011001", nipNidn: "0501108101", pangkat: "Lektor", jabatan: "Koordinator Program" },
                    { id: 2, nama: "Dr. Siti Rahayu", nipNik: "197905152003022001", nipNidn: "0302208102", pangkat: "Lektor Kepala", jabatan: "Ketua Program Studi" },
                    { id: 3, nama: "Dr. Budi Santoso", nipNik: "198512202008011002", nipNidn: "0801108103", pangkat: "Asisten Ahli", jabatan: "Sekretaris Program" }
                ],
                doktor: [
                    { id: 1, nama: "Prof. Dr. Indra Gunawan", nipNik: "196510101990031001", nipNidn: "9003108101", pangkat: "Guru Besar", jabatan: "Direktur Program" },
                    { id: 2, nama: "Prof. Dr. Maria Sari", nipNik: "196803151993032001", nipNidn: "9303208102", pangkat: "Guru Besar", jabatan: "Ketua Program" }
                ],
                professor: [
                    { id: 1, nama: "Prof. Dr. H. Bambang Sutrisno", nipNik: "195812121985031001", nipNidn: "8503108101", pangkat: "Guru Besar Madya", jabatan: "Rektor" },
                    { id: 2, nama: "Prof. Dr. Ir. Sri Mulyani", nipNik: "196004251988032001", nipNidn: "8803208102", pangkat: "Guru Besar Madya", jabatan: "Dekan" },
                    { id: 3, nama: "Prof. Dr. Joko Widodo", nipNik: "196106211991031001", nipNidn: "9103108103", pangkat: "Guru Besar", jabatan: "Ketua Senat" }
                ]
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

            // Current state
            let currentChannel = 'magister';
            let currentData = [...sampleData.magister];
            let isEditing = false;

            // Initialize the table
            function initializeTable() {
                renderTable();
                setupEventListeners();
            }

            // Render table with current data
            function renderTable() {
                dataTableBody.innerHTML = '';
                
                if (currentData.length === 0) {
                    dataTableBody.innerHTML = `
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-gray-500">
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
                    row.innerHTML = `
                        <td class="px-4 py-3 text-sm text-gray-700">${item.id}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">${item.nama}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">${item.nipNik}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">${item.nipNidn}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">${item.pangkat}</td>
                        <td class="px-4 py-3 text-sm text-gray-700">${item.jabatan}</td>
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
                
                // View selector
                
                // Add button
                addBtn.addEventListener('click', function() {
                    isEditing = false;
                    modalTitle.textContent = 'Tambah Data';
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
                
                // Update table title
                const titles = {
                    magister: 'Data Magister',
                    doktor: 'Data Doktor',
                    professor: 'Data Professor'
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
                modalTitle.textContent = 'Edit Data';
                
                // Fill form with data
                document.getElementById('nama').value = item.nama;
                document.getElementById('nipNik').value = item.nipNik;
                document.getElementById('nipNidn').value = item.nipNidn;
                document.getElementById('pangkat').value = item.pangkat;
                document.getElementById('jabatan').value = item.jabatan;
                editId.value = item.id;
                
                dataModal.classList.remove('hidden');
            }

            // Save data (add or edit)
            function saveData() {
                const formData = new FormData(dataForm);
                const newItem = {
                    id: isEditing ? parseInt(formData.get('id')) : currentData.length + 1,
                    nama: formData.get('nama'),
                    nipNik: formData.get('nipNik'),
                    nipNidn: formData.get('nipNidn'),
                    pangkat: formData.get('pangkat'),
                    jabatan: formData.get('jabatan')
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