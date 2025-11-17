<x-app-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Fakultas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .hover-scale:hover {
            transform: scale(1.02);
        }
        
        .transition-smooth {
            transition: all 0.3s ease-out;
        }
        
        .fakultas-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-left: 4px solid;
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 1.5rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background: #f59e0b;
            border-radius: 2px;
        }
        
        .prodi-link {
            transition: all 0.2s ease;
        }
        
        .prodi-link:hover {
            transform: translateX(4px);
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
                        <i class="fas fa-university text-white text-sm"></i>
                    </div>
                    <span class="font-bold text-gray-800 text-lg">Dashboard Fakultas</span>
                </div>
            </div>
            
            <!-- Right side - Profile -->
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <div class="flex flex-col items-end">
                        <span class="text-sm font-medium text-gray-700">{{ Auth::user()->nama_lengkap ?? 'Admin' }}</span>
                        <span class="text-xs text-gray-500">Administrator Fakultas</span>
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
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="col-span-12 bg-gradient-to-r from-yellow-400 to-yellow-300 text-center text-gray-800 font-bold p-6 rounded-2xl shadow-lg mb-8">
                <h1 class="text-2xl md:text-3xl mb-2">Selamat Datang di Dashboard Fakultas</h1>
                <p class="text-lg opacity-90">Kelola data fakultas dan program studi dengan mudah</p>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 md:gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 transition-smooth hover-scale">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700">Total Fakultas</h3>
                            <p class="text-sm text-gray-500 mt-1">S1 & Pascasarjana</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-university text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-3xl font-bold text-gray-800">8</span>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 transition-smooth hover-scale">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700">Program S1</h3>
                            <p class="text-sm text-gray-500 mt-1">Sarjana</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-graduate text-green-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-3xl font-bold text-gray-800">7</span>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 transition-smooth hover-scale">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700">Pascasarjana</h3>
                            <p class="text-sm text-gray-500 mt-1">S2 & S3</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-tie text-purple-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-3xl font-bold text-gray-800">1</span>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 transition-smooth hover-scale">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700">Total Prodi</h3>
                            <p class="text-sm text-gray-500 mt-1">Semua Jenjang</p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-book-open text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-3xl font-bold text-gray-800">35</span>
                    </div>
                </div>
            </div>

            <!-- S1 Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-800 section-title">Program Sarjana (S1)</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- FKIP -->
                    <div class="fakultas-card rounded-xl shadow-sm border border-gray-200 p-6 transition-smooth hover-scale" style="border-left-color: #3b82f6;">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Fakultas Keguruan dan Ilmu Pendidikan</h3>
                                <div class="flex items-center text-sm text-gray-600 mb-1">
                                    <i class="fas fa-graduation-cap mr-2"></i>
                                    <span>Jenjang: S1</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-list-ol mr-2"></i>
                                    <span>19 Program Studi</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chalkboard-teacher text-blue-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <h4 class="font-semibold text-gray-700 mb-2">Program Studi:</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-sd" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Guru Sekolah Dasar
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-bahasa-inggris" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Bahasa Inggris
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-kimia" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Kimia
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-non-formal" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Non Formal
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-biologi" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Biologi
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/bimbingan-konseling" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Bimbingan dan Konseling
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-matematika" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Matematika
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-sosiologi" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Sosiologi
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-matematika" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Matematika
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-fisika" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Fisika
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-pancasila" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Pancasila dan Kewarganegaraan
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-seni" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Seni dan Pertunjukan
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-sejarah" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Sejarah
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-vokasi-elektro" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Vokasi Teknik Elektro
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-bahasa-indonesia" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Bahasa Indonesia
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-paud" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Guru Pendidikan Anak Usia Dini
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-ipa" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan IPA
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-khusus" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Khusus
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/fkip/pendidikan-vokasi-mesin" class="prodi-link text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Vokasi Teknik Mesin
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Akreditasi A</span>
                            <a href="/fakultas/fkip" class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center">
                                Kelola <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Teknik -->
                    <div class="fakultas-card rounded-xl shadow-sm border border-gray-200 p-6 transition-smooth hover-scale" style="border-left-color: #ef4444;">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Fakultas Teknik</h3>
                                <div class="flex items-center text-sm text-gray-600 mb-1">
                                    <i class="fas fa-graduation-cap mr-2"></i>
                                    <span>Jenjang: S1</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-list-ol mr-2"></i>
                                    <span>7 Program Studi</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-cogs text-red-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <h4 class="font-semibold text-gray-700 mb-2">Program Studi:</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>
                                    <a href="/fakultas/teknik/teknik-industri" class="prodi-link text-red-600 hover:text-red-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Teknik Industri
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/teknik/teknik-kimia" class="prodi-link text-red-600 hover:text-red-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Teknik Kimia
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/teknik/teknik-elektro" class="prodi-link text-red-600 hover:text-red-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Teknik Elektro
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/teknik/teknik-mesin" class="prodi-link text-red-600 hover:text-red-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Teknik Mesin
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/teknik/teknik-sipil" class="prodi-link text-red-600 hover:text-red-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Teknik Sipil
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/teknik/informatika" class="prodi-link text-red-600 hover:text-red-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Informatika
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/teknik/statistika" class="prodi-link text-red-600 hover:text-red-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Statistika
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <span class="px-3 py-1 bg-red-100 text-red-800 text-xs font-medium rounded-full">Akreditasi A</span>
                            <a href="/fakultas/teknik" class="text-red-600 hover:text-red-800 font-medium text-sm flex items-center">
                                Kelola <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Pertanian -->
                    <div class="fakultas-card rounded-xl shadow-sm border border-gray-200 p-6 transition-smooth hover-scale" style="border-left-color: #10b981;">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Fakultas Pertanian</h3>
                                <div class="flex items-center text-sm text-gray-600 mb-1">
                                    <i class="fas fa-graduation-cap mr-2"></i>
                                    <span>Jenjang: S1</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-list-ol mr-2"></i>
                                    <span>5 Program Studi</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-seedling text-green-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <h4 class="font-semibold text-gray-700 mb-2">Program Studi:</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>
                                    <a href="/fakultas/pertanian/agroteknologi" class="prodi-link text-green-600 hover:text-green-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Agroteknologi
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/pertanian/agribisnis" class="prodi-link text-green-600 hover:text-green-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Agribisnis
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/pertanian/agroteknologi" class="prodi-link text-green-600 hover:text-green-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Agroteknologi
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/pertanian/teknologi-pangan" class="prodi-link text-green-600 hover:text-green-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Teknologi Pangan
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Akreditasi A</span>
                            <a href="/fakultas/pertanian" class="text-green-600 hover:text-green-800 font-medium text-sm flex items-center">
                                Kelola <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Ekonomi dan Bisnis -->
                    <div class="fakultas-card rounded-xl shadow-sm border border-gray-200 p-6 transition-smooth hover-scale" style="border-left-color: #f59e0b;">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Fakultas Ekonomi dan Bisnis</h3>
                                <div class="flex items-center text-sm text-gray-600 mb-1">
                                    <i class="fas fa-graduation-cap mr-2"></i>
                                    <span>Jenjang: S1</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-list-ol mr-2"></i>
                                    <span>4 Program Studi</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chart-line text-yellow-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <h4 class="font-semibold text-gray-700 mb-2">Program Studi:</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>
                                    <a href="/fakultas/ekonomi/manajemen" class="prodi-link text-yellow-600 hover:text-yellow-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Manajemen
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/ekonomi/akuntansi" class="prodi-link text-yellow-600 hover:text-yellow-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Akuntansi
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/ekonomi/ekonomi-pembangunan" class="prodi-link text-yellow-600 hover:text-yellow-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Ekonomi Pembangunan
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/ekonomi/ekonomi-syariah" class="prodi-link text-yellow-600 hover:text-yellow-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Ekonomi Syariah
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Akreditasi A</span>
                            <a href="/fakultas/ekonomi" class="text-yellow-600 hover:text-yellow-800 font-medium text-sm flex items-center">
                                Kelola <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Hukum -->
                    <div class="fakultas-card rounded-xl shadow-sm border border-gray-200 p-6 transition-smooth hover-scale" style="border-left-color: #8b5cf6;">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Fakultas Hukum</h3>
                                <div class="flex items-center text-sm text-gray-600 mb-1">
                                    <i class="fas fa-graduation-cap mr-2"></i>
                                    <span>Jenjang: S1</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-list-ol mr-2"></i>
                                    <span>3 Program Studi</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-gavel text-purple-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <h4 class="font-semibold text-gray-700 mb-2">Program Studi:</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>
                                    <a href="/fakultas/hukum/ilmu-hukum" class="prodi-link text-purple-600 hover:text-purple-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Ilmu Hukum
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <span class="px-3 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">Akreditasi A</span>
                            <a href="/fakultas/hukum" class="text-purple-600 hover:text-purple-800 font-medium text-sm flex items-center">
                                Kelola <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Ilmu Sosial dan Politik -->
                    <div class="fakultas-card rounded-xl shadow-sm border border-gray-200 p-6 transition-smooth hover-scale" style="border-left-color: #ec4899;">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Fakultas Ilmu Sosial dan Politik</h3>
                                <div class="flex items-center text-sm text-gray-600 mb-1">
                                    <i class="fas fa-graduation-cap mr-2"></i>
                                    <span>Jenjang: S1</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-list-ol mr-2"></i>
                                    <span>5 Program Studi</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-pink-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <h4 class="font-semibold text-gray-700 mb-2">Program Studi:</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>
                                    <a href="/fakultas/isipol/ilmu-pemerintahan" class="prodi-link text-pink-600 hover:text-pink-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Ilmu Pemerintahan
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/isipol/ilmu-komunikasi" class="prodi-link text-pink-600 hover:text-pink-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Ilmu Komunikasi
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/isipol/administrasi-negara" class="prodi-link text-pink-600 hover:text-pink-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Administrasi Negara
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <span class="px-3 py-1 bg-pink-100 text-pink-800 text-xs font-medium rounded-full">Akreditasi A</span>
                            <a href="/fakultas/isipol" class="text-pink-600 hover:text-pink-800 font-medium text-sm flex items-center">
                                Kelola <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Kedokteran -->
                    <div class="fakultas-card rounded-xl shadow-sm border border-gray-200 p-6 transition-smooth hover-scale" style="border-left-color: #06b6d4;">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Fakultas Kedokteran</h3>
                                <div class="flex items-center text-sm text-gray-600 mb-1">
                                    <i class="fas fa-graduation-cap mr-2"></i>
                                    <span>Jenjang: S1</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-list-ol mr-2"></i>
                                    <span>4 Program Studi</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-cyan-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-stethoscope text-cyan-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <h4 class="font-semibold text-gray-700 mb-2">Program Studi:</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>
                                    <a href="/fakultas/kedokteran/pendidikan-dokter" class="prodi-link text-cyan-600 hover:text-cyan-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Dokter
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/kedokteran/gizi" class="prodi-link text-cyan-600 hover:text-cyan-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Gizi
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/kedokteran/pendidikan-olahraga" class="prodi-link text-cyan-600 hover:text-cyan-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Pendidikan Olahraga
                                    </a>
                                </li>
                                <li>
                                    <a href="/fakultas/kedokteran/keperawatan" class="prodi-link text-cyan-600 hover:text-cyan-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Keperawatan
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <span class="px-3 py-1 bg-cyan-100 text-cyan-800 text-xs font-medium rounded-full">Akreditasi A</span>
                            <a href="/fakultas/kedokteran" class="text-cyan-600 hover:text-cyan-800 font-medium text-sm flex items-center">
                                Kelola <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pascasarjana Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-800 section-title">Pascasarjana</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                    <!-- Pascasarjana -->
                    <div class="fakultas-card rounded-xl shadow-sm border border-gray-200 p-6 transition-smooth hover-scale" style="border-left-color: #6b7280;">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Pascasarjana</h3>
                                <div class="flex items-center text-sm text-gray-600 mb-1">
                                    <i class="fas fa-graduation-cap mr-2"></i>
                                    <span>Jenjang: S2 & S3</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-list-ol mr-2"></i>
                                    <span>8 Program Studi</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-tie text-gray-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <h4 class="font-semibold text-gray-700 mb-2">Program Studi (S2):</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>
                                    <a href="/pascasarjana/magister-hukum" class="prodi-link text-gray-600 hover:text-gray-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Magister Ilmu Hukum
                                    </a>
                                </li>
                                <li>
                                    <a href="/pascasarjana/magister-akuntansi" class="prodi-link text-gray-600 hover:text-gray-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Magister Ilmu Akuntansi
                                    </a>
                                </li>
                                <li>
                                    <a href="/pascasarjana/magister-pendidikan-bahasa-inggris" class="prodi-link text-gray-600 hover:text-gray-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Magister Pendidikan Bahasa Inggris
                                    </a>
                                </li>
                                <li>
                                    <a href="/pascasarjana/magister-ilmu-komunikasi" class="prodi-link text-gray-600 hover:text-gray-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Magister Ilmu Komunikasi
                                    </a>
                                </li>
                                <li>
                                    <a href="/pascasarjana/magister-ilmu-pertanian" class="prodi-link text-gray-600 hover:text-gray-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Magister Ilmu Pertanian
                                    </a>
                                </li>
                                <li>
                                    <a href="/pascasarjana/magister-administrasi-publik" class="prodi-link text-gray-600 hover:text-gray-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Magister Administrasi Publik
                                    </a>
                                </li>
                                <li>
                                    <a href="/pascasarjana/magister-pendidikan-matematika" class="prodi-link text-gray-600 hover:text-gray-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Magister Pendidikan Matematika
                                    </a>
                                </li>
                                <li>
                                    <a href="/pascasarjana/magister-pendidikan-bahasa-indonesia" class="prodi-link text-gray-600 hover:text-gray-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Magister Pendidikan Bahasa Indonesia
                                    </a>
                                </li>
                                <li>
                                    <a href="/pascasarjana/magister-teknik-kimia" class="prodi-link text-gray-600 hover:text-gray-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Magister Teknik Kimia
                                    </a>
                                </li>
                                <li>
                                    <a href="/pascasarjana/magister-manajemen" class="prodi-link text-gray-600 hover:text-gray-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Magister Manajemen
                                    </a>
                                </li>
                                <li>
                                    <a href="/pascasarjana/magister-teknologi-pendidikan" class="prodi-link text-gray-600 hover:text-gray-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Magister Teknologi Pendidikan
                                    </a>
                                </li>
                            </ul>
                            <h4 class="font-semibold text-gray-700 mb-2 mt-3">Program Studi (S3):</h4>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>
                                    <a href="/pascasarjana/doktor-ilmu-pendidikan" class="prodi-link text-gray-600 hover:text-gray-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Doktor Ilmu Pendidikan
                                    </a>
                                </li>
                                <li>
                                    <a href="/pascasarjana/doktor-ilmu-akuntansi" class="prodi-link text-gray-600 hover:text-gray-800 hover:underline flex items-center">
                                        <i class="fas fa-arrow-right mr-2 text-xs"></i>Doktor Ilmu Akuntansi
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 flex justify-between">
                            <span class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-medium rounded-full">Akreditasi A</span>
                            <a href="/pascasarjana" class="text-gray-600 hover:text-gray-800 font-medium text-sm flex items-center">
                                Kelola <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Statistik Pascasarjana -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Statistik Pascasarjana</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-sm text-gray-600 mb-1">
                                    <span>Program Magister (S2)</span>
                                    <span>5 Program</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: 100%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm text-gray-600 mb-1">
                                    <span>Program Doktor (S3)</span>
                                    <span>3 Program</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-purple-600 h-2 rounded-full" style="width: 60%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm text-gray-600 mb-1">
                                    <span>Mahasiswa Aktif</span>
                                    <span>1,250</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-600 h-2 rounded-full" style="width: 75%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm text-gray-600 mb-1">
                                    <span>Dosen Pembimbing</span>
                                    <span>85</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-yellow-600 h-2 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</x-app-layout>