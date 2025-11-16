<x-app-layout>
@section('title', 'Detail Registrasi Mahasiswa')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Detail Registrasi Mahasiswa</h1>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            
            <!-- Left Card: Data Mahasiswa -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Data Mahasiswa</h2>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">NIM</label>
                        <p class="text-base font-semibold text-gray-800">000000000</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Nama</label>
                        <p class="text-base font-semibold text-gray-800">ADMIN</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Prodi</label>
                        <p class="text-base font-semibold text-gray-800">Informatika - S1</p>
                    </div>
                </div>
            </div>

            <!-- Right Card: Detail Registrasi -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Detail Registrasi</h2>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Semester</label>
                        <p class="text-base font-semibold text-gray-800">2024/2025</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Status Registrasi</label>
                        <p class="text-base font-semibold text-gray-800">Non-Aktif</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Nominal Wajib Bayar</label>
                        <p class="text-base font-semibold text-gray-800">Rp 4.500.000</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Payment Status Card -->
        <div class="bg-gradient-to-br from-red-400 to-red-500 rounded-2xl shadow-lg p-8 text-center text-white">
            <div class="mb-6">
                <h3 class="text-2xl font-bold mb-2">Deskripsi Pembayaran</h3>
                <p class="text-red-100">Registrasi 2024/2025</p>
            </div>
            
            <!-- Icon -->
            <div class="flex justify-center mb-6">
                <div class="bg-white bg-opacity-20 rounded-xl p-6 backdrop-blur-sm">
</x-app-layout>