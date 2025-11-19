<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Admin - Program Studi</title>
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

            .semester-badge {
                background-color: #e0f2fe;
                color: #0369a1;
            }
        </style>
    </head>

    <body class="bg-gray-50">
        <nav class="bg-white shadow-sm border-b border-gray-200 px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center"> <i
                                class="fas fa-graduation-cap text-white text-sm"></i> </div> <span
                            class="font-bold text-gray-800 text-lg">Dashboard Program Studi</span>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <div class="flex flex-col items-end"> <span
                                class="text-sm font-medium text-gray-700">{{ Auth::user()->nama_lengkap ?? 'Admin' }}</span>
                            <span class="text-xs text-gray-500">Koordinator Program Studi</span>
                        </div> <a href="/profile/admin" class="relative"> <img
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80"
                                alt="Profile Picture"
                                class="w-10 h-10 rounded-full object-cover border-2 border-yellow-400"> </a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="p-4 sm:p-6 bg-gray-50 min-h-screen">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 md:gap-x-6 md:gap-y-6">
                <div
                    class="col-span-12 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                    <div class="flex flex-wrap gap-2"> <button id="matakuliahBtn"
                            class="channel-btn bg-white text-gray-700 px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors active-channel">
                            <i class="fas fa-book mr-2"></i>Mata Kuliah </button> <button id="kurikulumBtn"
                            class="channel-btn bg-white text-gray-700 px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                            <i class="fas fa-calendar-alt mr-2"></i>Kurikulum </button> </div>
                    <div class="relative"> <select id="viewSelector"
                            class="bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                            <option value="/dashboard-admin/dosen">Edit Dosen</option>
                            <option value="/dashboard-admin/mahasiswa">Edit Mahasiswa</option>
                            <option value="/dashboard-admin/prodi">Edit Prodi</option>
                            <option value="/dashboard-admin/mk" selected>Edit Mk</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="flex justify-between items-center p-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-800" id="tableTitle">Data Mata Kuliah</h2> <button
                            id="addBtn"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center">
                            <i class="fas fa-plus mr-2"></i>Tambah Mata Kuliah </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50" id="tableHead">
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="dataTableBody">
                            </tbody>
                        </table>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                        <div class="text-sm text-gray-700"> Menampilkan <span id="startItem">1</span> - <span
                                id="endItem">5</span> dari <span id="totalItems">20</span> data </div>
                        <div class="flex space-x-2"> <button
                                class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                                <i class="fas fa-chevron-left"></i> </button> <button
                                class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                                <i class="fas fa-chevron-right"></i> </button> </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="dataModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
            <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                <div class="flex justify-between items-center p-4 border-b border-gray-200 sticky top-0 bg-white">
                    <h3 class="text-lg font-semibold text-gray-800" id="modalTitle">Tambah Mata Kuliah</h3> <button
                        id="closeModal" class="text-gray-400 hover:text-gray-600"> <i class="fas fa-times"></i>
                    </button>
                </div>
                <form id="dataForm" class="p-4 space-y-4"> <input type="hidden" id="editId" name="id">
                    <div id="formContent" class="space-y-4">
                    </div>
                    <div class="flex justify-end space-x-3 pt-4 sticky bottom-0 bg-white pb-2"> <button type="button"
                            id="cancelBtn"
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
            document.addEventListener('DOMContentLoaded',
                function() {
                    // Sample data for demonstration
                    const sampleData = {
                        matakuliah: [{
                            id: 1,
                            kode: "TI101",
                            nama: "Algoritma dan Pemrograman",
                            sks: 3,
                            semester: "1",
                            dosen: "Dr. Ahmad Wijaya, M.Kom.",
                            prodi: "Teknik Informatika",
                            angkatan: "2023",
                            kelas: "A",
                            jenjang: "S1",
                            status: "Aktif",
                            deskripsi: "Mata kuliah dasar pemrograman dan algoritma"
                        }, {
                            id: 2,
                            kode: "TI101",
                            nama: "Algoritma dan Pemrograman",
                            sks: 3,
                            semester: "1",
                            dosen: "Dr. Ahmad Wijaya, M.Kom.",
                            prodi: "Teknik Informatika",
                            angkatan: "2023",
                            kelas: "B",
                            jenjang: "S1",
                            status: "Aktif",
                            deskripsi: "Mata kuliah dasar pemrograman dan algoritma"
                        }, {
                            id: 3,
                            kode: "SI201",
                            nama: "Basis Data",
                            sks: 4,
                            semester: "3",
                            dosen: "Prof. Budi Santoso, Ph.D.",
                            prodi: "Sistem Informasi",
                            angkatan: "2022",
                            kelas: "A",
                            jenjang: "S1",
                            status: "Aktif",
                            deskripsi: "Konsep dan implementasi sistem basis data"
                        }, {
                            id: 4,
                            kode: "IK301",
                            nama: "Machine Learning",
                            sks: 3,
                            semester: "5",
                            dosen: "Dr. Maya Sari, M.Sc.",
                            prodi: "Ilmu Komputer",
                            angkatan: "2021",
                            kelas: "Internasional",
                            jenjang: "S1",
                            status: "Aktif",
                            deskripsi: "Pengenalan machine learning dan aplikasinya"
                        }, {
                            id: 5,
                            kode: "TE401",
                            nama: "Jaringan Komputer",
                            sks: 4,
                            semester: "4",
                            dosen: "Ir. Rizki Pratama, M.T.",
                            prodi: "Teknik Elektro",
                            angkatan: "2022",
                            kelas: "C",
                            jenjang: "S1",
                            status: "Nonaktif",
                            deskripsi: "Fundamental jaringan komputer dan protokol"
                        }],
                        // Data Kurikulum
                        kurikulum: [{
                            id: 101,
                            nama: "Kurikulum 2020",
                            prodi: "Teknik Informatika",
                            jenjang: "S1",
                            tahun_berlaku: "2020/2021",
                            sks_total: 144,
                            status: "Aktif",
                            deskripsi: "Kurikulum berbasis OBE dengan fokus pada Artificial Intelligence dan Cloud Computing."
                        }, {
                            id: 102,
                            nama: "Kurikulum Merdeka Belajar",
                            prodi: "Sistem Informasi",
                            jenjang: "S1",
                            tahun_berlaku: "2021/2022",
                            sks_total: 146,
                            status: "Aktif",
                            deskripsi: "Kurikulum yang mendukung program Merdeka Belajar Kampus Merdeka (MBKM)."
                        }, {
                            id: 103,
                            nama: "Kurikulum Standar Nasional",
                            prodi: "Ilmu Komputer",
                            jenjang: "S1",
                            tahun_berlaku: "2018/2019",
                            sks_total: 142,
                            status: "Nonaktif",
                            deskripsi: "Kurikulum lama yang berfokus pada dasar-dasar ilmu komputer."
                        }],
                    };

                    // Dosen options
                    const dosenOptions = [
                        "Dr. Ahmad Wijaya, M.Kom.",
                        "Dr. Siti Rahayu, M.T.",
                        "Prof. Budi Santoso, Ph.D.",
                        "Dr. Maya Sari, M.Sc.",
                        "Ir. Rizki Pratama, M.T.",
                        "Dr. Indra Gunawan, M.Eng.",
                        "Prof. Maria Sari, Ph.D.",
                        "Dr. Joko Widodo, M.Kom."
                    ];

                    // DOM Elements
                    const channelBtns = document.querySelectorAll('.channel-btn');
                    const viewSelector = document.getElementById('viewSelector');
                    const tableTitle = document.getElementById('tableTitle');
                    const tableHead = document.getElementById('tableHead');
                    const dataTableBody = document.getElementById('dataTableBody');
                    const addBtn = document.getElementById('addBtn');
                    const dataModal = document.getElementById('dataModal');
                    const modalTitle = document.getElementById('modalTitle');
                    const closeModal = document.getElementById('closeModal');
                    const cancelBtn = document.getElementById('cancelBtn');
                    const dataForm = document.getElementById('dataForm');
                    const editId = document.getElementById('editId');
                    const formContent = document.getElementById('formContent'); // Container form

                    // Current state
                    let currentChannel = 'matakuliah';
                    let currentData = [...sampleData.matakuliah];
                    let isEditing = false;

                    // --- Form Templates ---
                    const formMK = `
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div> <label for="kode" class="block text-sm font-medium text-gray-700 mb-1">Kode Mata Kuliah</label> <input type="text" id="kode" name="kode" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required> </div>
                            <div> <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Mata Kuliah</label> <input type="text" id="nama" name="nama" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required> </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div> <label for="sks" class="block text-sm font-medium text-gray-700 mb-1">SKS</label>
                                <select id="sks" name="sks" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                                    <option value="">Pilih SKS</option>
                                    <option value="1">1 SKS</option>
                                    <option value="2">2 SKS</option>
                                    <option value="3">3 SKS</option>
                                    <option value="4">4 SKS</option>
                                    <option value="6">6 SKS</option>
                                </select>
                            </div>
                            <div> <label for="semester" class="block text-sm font-medium text-gray-700 mb-1">Semester</label> <select id="semester" name="semester" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                                    <option value="">Pilih Semester</option>
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4">Semester 4</option>
                                    <option value="5">Semester 5</option>
                                    <option value="6">Semester 6</option>
                                    <option value="7">Semester 7</option>
                                    <option value="8">Semester 8</option>
                                </select> </div>
                            <div> <label for="jenjang" class="block text-sm font-medium text-gray-700 mb-1">Jenjang</label> <select id="jenjang" name="jenjang" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                                    <option value="">Pilih Jenjang</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select> </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div> <label for="dosen" class="block text-sm font-medium text-gray-700 mb-1">Dosen Pengampu</label> <select id="dosen" name="dosen" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                                    <option value="">Pilih Dosen</option>
                                </select> </div>
                            <div> <label for="prodi" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label> <select id="prodi" name="prodi" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                                    <option value="">Pilih Program Studi</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    <option value="Ilmu Komputer">Ilmu Komputer</option>
                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                    <option value="Manajemen">Manajemen</option>
                                </select> </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div> <label for="angkatan" class="block text-sm font-medium text-gray-700 mb-1">Angkatan</label> <select id="angkatan" name="angkatan" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                                    <option value="">Pilih Angkatan</option>
                                </select> </div>
                            <div> <label for="jumlah_kelas" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Kelas (A, B, C, ...)</label>
                                <input type="number" id="jumlah_kelas" name="jumlah_kelas" min="1" max="10" value="1"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                                <p class="text-xs text-gray-500 mt-1">Sistem akan membuat Kelas A, B, C, dst.</p>
                            </div>
                        </div>
                        <div> <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Mata Kuliah</label>
                            <textarea id="deskripsi" name="deskripsi" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Deskripsi singkat tentang mata kuliah..."></textarea>
                        </div>
                        <div> <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                                <option value="">Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                                <option value="Dalam Review">Dalam Review</option>
                            </select>
                        </div>
                    `;

                    const formKurikulum = `
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div> <label for="nama_kurikulum" class="block text-sm font-medium text-gray-700 mb-1">Nama Kurikulum</label> <input type="text" id="nama_kurikulum" name="nama_kurikulum" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required> </div>
                            <div> <label for="tahun_berlaku" class="block text-sm font-medium text-gray-700 mb-1">Tahun Berlaku</label> <input type="text" id="tahun_berlaku" name="tahun_berlaku" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Cth: 2021/2022" required> </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div> <label for="prodi_kur" class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label> <select id="prodi_kur" name="prodi_kur" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                                    <option value="">Pilih Program Studi</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    <option value="Ilmu Komputer">Ilmu Komputer</option>
                                </select> </div>
                            <div> <label for="jenjang_kur" class="block text-sm font-medium text-gray-700 mb-1">Jenjang</label> <select id="jenjang_kur" name="jenjang_kur" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                                    <option value="">Pilih Jenjang</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select> </div>
                            <div> <label for="sks_total" class="block text-sm font-medium text-gray-700 mb-1">Total SKS</label> <input type="number" id="sks_total" name="sks_total" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required> </div>
                        </div>
                        <div> <label for="deskripsi_kur" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Kurikulum</label>
                            <textarea id="deskripsi_kur" name="deskripsi_kur" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Deskripsi singkat tentang kurikulum..."></textarea>
                        </div>
                        <div> <label for="status_kur" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select id="status_kur" name="status_kur" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" required>
                                <option value="">Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                                <option value="Dalam Review">Dalam Review</option>
                            </select>
                        </div>
                    `;

                    // --- Initialization and Helper Functions (Dosen/Angkatan) ---

                    function initializeTable() {
                        // Set default form content on load
                        formContent.innerHTML = formMK;
                        populateAngkatanOptions();
                        populateDosenOptions();
                        renderTable();
                        setupEventListeners();
                    }

                    function populateAngkatanOptions() {
                        // Only populate if the select element exists (i.e. MK form is loaded)
                        const angkatanSelect = document.getElementById('angkatan');
                        if (!angkatanSelect) return;

                        // Clear existing options
                        angkatanSelect.innerHTML = '<option value="">Pilih Angkatan</option>';

                        const currentYear = new Date().getFullYear();
                        for (let year = currentYear; year >= currentYear - 5; year--) {
                            const option = document.createElement('option');
                            option.value = year;
                            option.textContent = year;
                            angkatanSelect.appendChild(option);
                        }
                    }

                    function populateDosenOptions() {
                        // Only populate if the select element exists (i.e. MK form is loaded)
                        const dosenSelect = document.getElementById('dosen');
                        if (!dosenSelect) return;

                        // Clear existing options
                        dosenSelect.innerHTML = '<option value="">Pilih Dosen</option>';

                        dosenOptions.forEach(dosen => {
                            const option = document.createElement('option');
                            option.value = dosen;
                            option.textContent = dosen;
                            dosenSelect.appendChild(option);
                        });
                    }

                    // --- Render Tables ---

                    function renderTable() {
                        dataTableBody.innerHTML = '';
                        // 1. Render Table Header
                        if (currentChannel === 'matakuliah') {
                            tableHead.innerHTML = `
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mata Kuliah</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKS</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semester</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dosen Pengampu</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Angkatan</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            `;
                        } else if (currentChannel === 'kurikulum') {
                            tableHead.innerHTML = `
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kurikulum</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Program Studi</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenjang</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Berlaku</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total SKS</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            `;
                        }

                        // 2. Render Table Body (Empty State & Pagination)
                        if (currentData.length === 0) {
                            document.getElementById('startItem').textContent = 0;
                            document.getElementById('endItem').textContent = 0;
                            document.getElementById('totalItems').textContent = 0;

                            const colspanCount = currentChannel === 'matakuliah' ? 9 : 7;
                            dataTableBody.innerHTML = `
                                <tr>
                                    <td colspan="${colspanCount}" class="px-4 py-8 text-center text-gray-500">
                                        <i class="fas fa-inbox text-4xl mb-2"></i>
                                        <p>Tidak ada data</p>
                                    </td>
                                </tr>
                            `;
                            return;
                        }

                        // Update pagination details (Simplified for demo)
                        document.getElementById('startItem').textContent = 1;
                        document.getElementById('endItem').textContent = currentData.length;
                        document.getElementById('totalItems').textContent = currentData.length;


                        // 3. Render Table Body (Data Rows)
                        currentData.forEach(item => {
                            const row = document.createElement('tr');
                            row.className = 'hover:bg-gray-50 transition-colors';

                            // Determine status badge class
                            let statusClass = '';
                            if (item.status === 'Aktif') {
                                statusClass = 'status-aktif';
                            } else if (item.status === 'Nonaktif') {
                                statusClass = 'status-nonaktif';
                            }

                            let rowHTML = '';

                            if (currentChannel === 'matakuliah') {
                                rowHTML = `
                                    <td class="px-4 py-3 text-sm text-gray-700 font-mono">${item.kode}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">
                                        <div class="font-medium">${item.nama}</div>
                                        <div class="text-xs text-gray-500 mt-1">${item.prodi} - ${item.jenjang}</div>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-700">${item.sks} SKS</td>
                                    <td class="px-4 py-3 text-sm">
                                        <span class="px-2 py-1 rounded-full text-xs font-medium semester-badge">Semester ${item.semester}</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-700">${item.dosen}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">${item.angkatan}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">${item.kelas}</td>
                                    <td class="px-4 py-3 text-sm">
                                        <span class="px-2 py-1 rounded-full text-xs font-medium ${statusClass}">${item.status}</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <button class="edit-btn text-yellow-600 hover:text-yellow-800 mr-2" data-id="${item.id}" data-channel="${currentChannel}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="delete-btn text-red-600 hover:text-red-800" data-id="${item.id}" data-channel="${currentChannel}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                `;
                            } else if (currentChannel === 'kurikulum') {
                                rowHTML = `
                                    <td class="px-4 py-3 text-sm text-gray-700 font-medium">${item.nama}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">${item.prodi}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">${item.jenjang}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">${item.tahun_berlaku}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">${item.sks_total} SKS</td>
                                    <td class="px-4 py-3 text-sm">
                                        <span class="px-2 py-1 rounded-full text-xs font-medium ${statusClass}">${item.status}</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <button class="edit-btn text-yellow-600 hover:text-yellow-800 mr-2" data-id="${item.id}" data-channel="${currentChannel}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="delete-btn text-red-600 hover:text-red-800" data-id="${item.id}" data-channel="${currentChannel}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                `;
                            }

                            row.innerHTML = rowHTML;
                            dataTableBody.appendChild(row);
                        });
                    }

                    // --- Event Handlers ---

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
                            dataForm.reset();
                            editId.value = '';

                            if (currentChannel === 'matakuliah') {
                                modalTitle.textContent = 'Tambah Mata Kuliah';
                                formContent.innerHTML = formMK; // Set MK Form
                                populateDosenOptions(); // Repopulate options
                                populateAngkatanOptions(); // Repopulate options
                            } else if (currentChannel === 'kurikulum') {
                                modalTitle.textContent = 'Tambah Kurikulum';
                                formContent.innerHTML = formKurikulum; // Set Kurikulum Form
                            }

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
                            const target = e.target.closest('.edit-btn, .delete-btn');
                            if (!target) return;

                            const id = parseInt(target.getAttribute('data-id'));

                            if (target.classList.contains('edit-btn')) {
                                editData(id);
                            } else if (target.classList.contains('delete-btn')) {
                                deleteData(id);
                            }
                        });
                    }

                    // Switch between channels
                    function switchChannel(channel) {
                        currentChannel = channel;
                        // Update table title and add button text
                        const titles = {
                            matakuliah: 'Data Mata Kuliah',
                            kurikulum: 'Data Kurikulum'
                        };
                        const buttonTexts = {
                            matakuliah: 'Tambah Mata Kuliah',
                            kurikulum: 'Tambah Kurikulum'
                        };
                        tableTitle.textContent = titles[channel] || 'Data';
                        addBtn.innerHTML = `<i class="fas fa-plus mr-2"></i>${buttonTexts[channel] || 'Tambah Data'}`;
                        // Update data
                        currentData = [...sampleData[channel]];
                        renderTable();

                        // Reset form content for next Add button click
                        if (currentChannel === 'matakuliah') {
                            formContent.innerHTML = formMK;
                            populateDosenOptions();
                            populateAngkatanOptions();
                        } else if (currentChannel === 'kurikulum') {
                            formContent.innerHTML = formKurikulum;
                        }
                    }

                    // Edit data
                    function editData(id) {
                        const item = currentData.find(d => d.id === id);
                        if (!item) return;

                        isEditing = true;
                        editId.value = item.id;
                        dataForm.reset();

                        if (currentChannel === 'matakuliah') {
                            // Cek apakah data ini adalah hasil generate, kita batasi edit di mode demo
                            if (item.kelas.length === 1 && item.kelas >= 'A' && item.kelas <=
                                'J') { // A-J as max 10 classes
                                alert(
                                    'Edit untuk Mata Kuliah yang dibuat otomatis dinonaktifkan. Silakan hapus dan buat ulang.'
                                    );
                                isEditing = false;
                                return;
                            }

                            modalTitle.textContent = 'Edit Mata Kuliah';
                            formContent.innerHTML = formMK;
                            populateDosenOptions();
                            populateAngkatanOptions();

                            // Fill MK form (hanya yang bisa diedit)
                            document.getElementById('kode').value = item.kode;
                            document.getElementById('nama').value = item.nama;
                            document.getElementById('sks').value = item.sks;
                            document.getElementById('semester').value = item.semester;
                            document.getElementById('dosen').value = item.dosen;
                            document.getElementById('prodi').value = item.prodi;
                            document.getElementById('angkatan').value = item.angkatan;
                            // Catatan: Karena ini edit, kita tidak memerlukan input 'jumlah_kelas',
                            // tetapi untuk menjaga form tetap valid, kita set 1 (atau sembunyikan field ini di real app)
                            const jumlahKelasInput = document.getElementById('jumlah_kelas');
                            if (jumlahKelasInput) jumlahKelasInput.value = 1;

                            document.getElementById('jenjang').value = item.jenjang;
                            document.getElementById('deskripsi').value = item.deskripsi;
                            document.getElementById('status').value = item.status;
                            dataModal.classList.remove('hidden');

                        } else if (currentChannel === 'kurikulum') {
                            modalTitle.textContent = 'Edit Kurikulum';
                            formContent.innerHTML = formKurikulum;

                            // Fill Kurikulum form
                            document.getElementById('nama_kurikulum').value = item.nama;
                            document.getElementById('tahun_berlaku').value = item.tahun_berlaku;
                            document.getElementById('prodi_kur').value = item.prodi;
                            document.getElementById('jenjang_kur').value = item.jenjang;
                            document.getElementById('sks_total').value = item.sks_total;
                            document.getElementById('deskripsi_kur').value = item.deskripsi;
                            document.getElementById('status_kur').value = item.status;
                            dataModal.classList.remove('hidden');
                        }
                    }

                    // Save data (add or edit)
                    function saveData() {
                        const formData = new FormData(dataForm);
                        let newItems = [];

                        if (currentChannel === 'matakuliah') {
                            const jumlahKelas = parseInt(formData.get('jumlah_kelas'));
                            // Jika mode Edit MK (yang dibatasi)
                            if (isEditing) {
                                alert('Fitur edit Mata Kuliah dalam mode demo dinonaktifkan.');
                                closeModalFunc();
                                return;
                            }

                            // --- Logic Generate Kelas (A, B, C, ...) ---
                            let nextId = currentData.length > 0 ? Math.max(...currentData.map(d => d.id)) + 1 : 1;

                            for (let i = 0; i < jumlahKelas; i++) {
                                // Generate nama kelas (A=65, B=66, C=67, ...)
                                const namaKelas = String.fromCharCode(65 + i);

                                const newItem = {
                                    id: nextId++, // ID unik
                                    kode: formData.get('kode'),
                                    nama: formData.get('nama'),
                                    sks: formData.get('sks'),
                                    semester: formData.get('semester'),
                                    dosen: formData.get('dosen'),
                                    prodi: formData.get('prodi'),
                                    angkatan: formData.get('angkatan'),
                                    kelas: namaKelas, // Kelas di-generate
                                    jenjang: formData.get('jenjang'),
                                    deskripsi: formData.get('deskripsi'),
                                    status: formData.get('status')
                                };
                                newItems.push(newItem);
                            }
                        } else if (currentChannel === 'kurikulum') {
                            // Logika Kurikulum
                            const newItem = {
                                id: isEditing ? parseInt(formData.get('id')) : (Math.max(...currentData.map(d => d
                                    .id)) + 1 || 101),
                                nama: formData.get('nama_kurikulum'),
                                prodi: formData.get('prodi_kur'),
                                jenjang: formData.get('jenjang_kur'),
                                tahun_berlaku: formData.get('tahun_berlaku'),
                                sks_total: parseInt(formData.get('sks_total')),
                                deskripsi: formData.get('deskripsi_kur'),
                                status: formData.get('status_kur')
                            };
                            newItems.push(newItem); // Hanya 1 item untuk Kurikulum
                        }

                        // --- Menyimpan data ke State Demo ---
                        if (isEditing && currentChannel === 'kurikulum') {
                            // Update existing Kurikulum item
                            const index = currentData.findIndex(item => item.id === newItems[0].id);
                            if (index !== -1) {
                                currentData[index] = newItems[0];
                                alert('Data Kurikulum diperbarui!');
                            }
                        } else if (currentChannel === 'matakuliah' && !isEditing) {
                            // Tambahkan semua item Mata Kuliah yang digenerate
                            newItems.forEach(item => {
                                currentData.push(item);
                                sampleData[currentChannel].push(item);
                            });
                            alert(
                                `${newItems.length} Mata Kuliah berhasil ditambahkan (Kelas A sampai ${String.fromCharCode(65 + newItems.length - 1)})!`
                                );
                        } else if (currentChannel === 'kurikulum' && !isEditing) {
                            // Tambahkan item Kurikulum baru
                            currentData.push(newItems[0]);
                            sampleData[currentChannel].push(newItems[0]);
                            alert('Data Kurikulum ditambahkan!');
                        }

                        renderTable();
                        closeModalFunc();
                    }

                    // Delete data
                    function deleteData(id) {
                        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                            // Filter current data
                            currentData = currentData.filter(item => item.id !== id);
                            // Filter sample data
                            sampleData[currentChannel] = sampleData[currentChannel].filter(item => item.id !== id);

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
