<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sikakang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>
<body class="bg-gray-50">
    <?php
    // Data galeri produk
    $gallery = [
        ['image' => '/images/ftuntirta.jpg', 'alt' => 'minju'],
        ['image' => '/images/s2.jpg', 'alt' => 'minju'],
        ['image' => '/images/fkuntirta.png', 'alt' => 'minju'],
        ['image' => '/images/fisip.webp', 'alt' => 'minju'],
        ['image' => '/images/untir1.webp', 'alt' => 'minju'],
        ['image' => '/images/fkip.jpeg', 'alt' => 'minju']
    ];
    ?>

    <!-- Hero Section -->
        <section class="relative min-h-[100vh] flex items-center">
        <!-- Background image with gray filter -->
        <div class="absolute inset-0 z-0">
            <img src="/images/image.png" alt="Background Skincare" class="w-full h-full object-cover filter grayscale-50">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
        
        <!-- Top bar with logo and profile -->
        <div class="absolute top-0 left-0 right-0 z-20 bg-[#FFE05E] text-black">
        <div class="mx-auto max-w-6xl px-4 py-3">
            <div class="flex items-center justify-center">
                <!-- Logo + text centered -->
                <div class="flex items-center gap-3 md:gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 md:w-12 md:h-12">
                            <img src="/images/untirta.png" alt="Logo untirta" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div>
                        <p class="text-xs md:text-sm uppercase tracking-wide font-semibold">
                            Universitas Sultan Ageng Tirtayasa
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <!-- Hero content -->
        <div class="relative z-10 w-full text-white">
            <div class="mx-auto max-w-4xl px-4 text-center">
                <p class="text-5xl md:text-4xl font-bold leading-tight mb-6">
                    Selamat datang di website resmi
                </p>
                <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6">
                Universitas Sultan Ageng Tirtayasa
                </h1>
                <p class="text-5xl md:text-3xl font-bold leading-tight mb-6">
                    Jujur, Adil, Wibawa, Religius, dan Akuntabel
                </p>
                <div class="flex gap-4 flex-wrap justify-center">
                    <a href="/login" class="inline-flex items-center gap-2 rounded-full bg-white text-blue-600 px-8 py-4 hover:bg-gray-100 transition font-medium text-lg">
                        Login Sekarang 
                        <i data-lucide="arrow-right" class="h-5 w-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
    // Simple dropdown functionality
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownButton = document.querySelector('button');
        const dropdownMenu = document.querySelector('.absolute.hidden');
        
        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>

    <!-- BERITA -->
<section class="bg-[#FFE05E] py-12">
    <div class="mx-auto max-w-6xl px-4">
        <h3 class="text-3xl font-semibold mb-8 text-gray-800 text-center">Berita Terkini</h3>
        
        <!-- Big Picture with Text -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <!-- Big Picture -->
                <div class="h-80 md:h-96">
                    <img src="/images/uktuntirta.jpg" alt="berita" class="w-full h-full object-cover">
                </div>
                
                <!-- Text Description -->
                <div class="p-8 space-y-4">
                    <h4 class="text-2xl font-bold text-gray-800">Penyesuaian UKT Semester Genap 2025/2026</h4>
                    <p class="text-gray-600 leading-relaxed">
                        Universitas Sultan Ageng Tirtayasa kembali mengeluarkan kebijakan penyesuaian UKT untuk periode Semester Genap Tahun Akademik 2025/2026 berdasarkan Peraturan Rektor Universitas Sultan Ageng Tirtayasa Nomor 15 Tahun 2025.
                    </p>
                    <br>
                    <a href="https://untirta.ac.id/2025/11/20/penyesuaian-ukt-semester-genap-2025-2026/" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium">
                        Baca Sekarang
                    </a>
                </div>
            </div>
        </div>

        <!-- Three Small Pictures with Text -->
        <div class="grid md:grid-cols-3 gap-6">
            <!-- Product 1 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="grid grid-cols-2 gap-4">
                    <div class="h-48">
                        <img src="/images/gsuntirta.png" alt="berita" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col justify-center">
                        <a href="https://untirta.ac.id/2025/11/04/gs-sigret-2025-untirta-perkuat-kolaborasi-global-menuju-inovasi-hijau-dan-keberlanjutan/" class="font-bold text-gray-800 mb-2">GS-SIGRET 2025: Untirta Perkuat Kolaborasi Global Menuju Inovasi Hijau dan Keberlanjutan</a>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="grid grid-cols-2 gap-4">
                    <div class="h-48">
                        <img src="/images/pltsuntir.jpeg" alt="berita" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col justify-center">
                        <a href="https://untirta.ac.id/2025/09/26/edukasi-dan-implementasi-plts-guna-menciptakan-energi-bersih-di-desa-pegandikan-lebak-wangi-banten/" class="font-bold text-gray-800 mb-2">Edukasi dan Implementasi PLTS Guna Menciptakan Energi Bersih di Desa Pegandikan, Lebak Wangi – Banten</a>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="grid grid-cols-2 gap-4">
                    <div class="h-48">
                        <img src="/images/fgduntir.jpeg" alt="berita" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex flex-col justify-center">
                        <a href="https://untirta.ac.id/2025/09/11/untirta-gelar-fgd-hilirisasi-inovasi-penelitian-dan-business-matching-dengan-industri/" class="font-bold text-gray-800 mb-2">Untirta Gelar FGD Hilirisasi Inovasi Penelitian dan Business Matching dengan Industri</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Galeri Produk Section -->
    <section class="py-12 bg-white">
        <div class="mx-auto max-w-6xl px-4 mb-6">
            <h3 class="text-xl font-semibold text-gray-800">Galeri Untirta</h3>
        </div>
        <div class="overflow-hidden">
            <div class="flex gap-4 px-4 animate-marquee whitespace-nowrap">
                <?php foreach (array_merge($gallery, $gallery) as $item): ?>
                    <div class="flex-shrink-0 w-64 md:w-80">
                        <div class="rounded-xl overflow-hidden border border-gray-200 bg-white">
                            <div class="aspect-square overflow-hidden bg-gray-100">
                                <img src="<?= $item['image'] ?>" alt="<?= $item['alt'] ?>" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

     <!-- VIDEO -->
    <section class="w-full">
        <div class="w-full">
            <div class="relative">
                <video 
                    autoplay 
                    muted 
                    loop 
                    playsinline
                    class="w-full h-64 md:h-80 lg:h-96 object-cover"
                >
                    <source src="/videos/videountirta.mp4" type="video/mp4">
                    <source src="/videos/toko-resmi.webm" type="video/webm">
                    <img src="/images/minju1.jpg" alt="minju" class="w-full h-full object-cover">
                </video>
                
                <!-- Simple Overlay -->
                <div class="absolute inset-0 flex items-center justify-center bg-black/40">
                    <div class="text-center text-white p-6">
                        <p class="text-xl mb-6 opacity-90">Video Profil Kami</p>
                        <a href="https://untirta.ac.id/" class="inline-flex items-center gap-3 bg-[#FFE05E] text-gray-800 px-8 py-4 rounded-xl hover:bg-[#FFD700] transition font-bold text-lg shadow-lg">
                            Kunjungi
                            <i data-lucide="arrow-right" class="h-5 w-5"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAKULTAS -->
        <section class="mx-auto max-w-6xl px-4 py-12">
            <div class="rounded-xl bg-white border border-gray-200 p-6 shadow-sm">
                <h2 class="font-semibold text-gray-800 mb-8 text-2xl text-center">Fakultas Untirta</h2>
                
                <!-- Top Row - 4 Categories -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-6">
                    <!-- Category 1 -->
                    <div class="text-center group">
                        <div class="aspect-square rounded-xl overflow-hidden bg-gray-100 mb-3 shadow-sm">
                            <img src="/images/ftuntirta.jpg" alt="teknik" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                        <a href="https://ft.untirta.ac.id/" class="inline-flex items-center gap-3 bg-[#FFE05E] text-gray-800 px-8 py-4 rounded-xl hover:bg-[#FFD700] transition font-bold text-lg shadow-lg">
                            Fakultas Teknik
                        </a>
                    </div>

                    <!-- Category 2 -->
                    <div class="text-center group">
                        <div class="aspect-square rounded-xl overflow-hidden bg-gray-100 mb-3 shadow-sm">
                            <img src="/images/feb.jpg" alt="feb" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                        <a href="https://feb.untirta.ac.id/" class="inline-flex items-center gap-3 bg-[#FFE05E] text-gray-800 px-8 py-4 rounded-xl hover:bg-[#FFD700] transition font-bold text-lg shadow-lg">
                            Fakultas Ekonomi dan Bisnis
                        </a>
                    </div>

                    <!-- Category 3 -->
                    <div class="text-center group">
                        <div class="aspect-square rounded-xl overflow-hidden bg-gray-100 mb-3 shadow-sm">
                            <img src="/images/fkip.jpeg" alt="fkip" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                        <a href="https://fkip.untirta.ac.id/" class="inline-flex items-center gap-3 bg-[#FFE05E] text-gray-800 px-8 py-4 rounded-xl hover:bg-[#FFD700] transition font-bold text-lg shadow-lg">
                            Fakultas Keguruan dan Ilmu Pendidikan
                        </a>
                    </div>

                    <!-- Category 4 -->
                    <div class="text-center group">
                        <div class="aspect-square rounded-xl overflow-hidden bg-gray-100 mb-3 shadow-sm">
                            <img src="/images/faperta.png" alt="faperta" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                        <a href="https://faperta.untirta.ac.id/" class="inline-flex items-center gap-3 bg-[#FFE05E] text-gray-800 px-8 py-4 rounded-xl hover:bg-[#FFD700] transition font-bold text-lg shadow-lg">
                            Fakultas Pertanian
                        </a>
                    </div>
                </div>

                <!-- Bottom Row - 4 Categories -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <!-- Category 5 -->
                    <div class="text-center group">
                        <div class="aspect-square rounded-xl overflow-hidden bg-gray-100 mb-3 shadow-sm">
                            <img src="/images/fisip.webp" alt="fisip" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                        <a href="https://fisip.untirta.ac.id/" class="inline-flex items-center gap-3 bg-[#FFE05E] text-gray-800 px-8 py-4 rounded-xl hover:bg-[#FFD700] transition font-bold text-lg shadow-lg">
                            Fakultas Ilmu Sosial dan Politik
                        </a>
                    </div>

                    <!-- Category 6 -->
                    <div class="text-center group">
                        <div class="aspect-square rounded-xl overflow-hidden bg-gray-100 mb-3 shadow-sm">
                            <img src="/images/fh.webp" alt="fh" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                        <a href="https://fh.untirta.ac.id/" class="inline-flex items-center gap-3 bg-[#FFE05E] text-gray-800 px-8 py-4 rounded-xl hover:bg-[#FFD700] transition font-bold text-lg shadow-lg">
                            Fakultas Hukum
                        </a>
                    </div>

                    <!-- Category 7 -->
                    <div class="text-center group">
                        <div class="aspect-square rounded-xl overflow-hidden bg-gray-100 mb-3 shadow-sm">
                            <img src="/images/fkuntirta.png" alt="fkik" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                        <a href="https://fkik.untirta.ac.id/" class="inline-flex items-center gap-3 bg-[#FFE05E] text-gray-800 px-8 py-4 rounded-xl hover:bg-[#FFD700] transition font-bold text-lg shadow-lg">
                            Fakultas Kedokteran dan Ilmu Kesehatan
                        </a>
                    </div>

                    <!-- Category 8 -->
                    <div class="text-center group">
                        <div class="aspect-square rounded-xl overflow-hidden bg-gray-100 mb-3 shadow-sm">
                            <img src="/images/s2.jpg" alt="s2" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        </div>
                        <a href="https://pascasarjana.untirta.ac.id/" class="inline-flex items-center gap-3 bg-[#FFE05E] text-gray-800 px-8 py-4 rounded-xl hover:bg-[#FFD700] transition font-bold text-lg shadow-lg">
                            Program Pascasarjana
                        </a>
                    </div>
                </div>
        </section>

        <!-- Footer Section -->
    <footer class="relative w-full bg-gray-900 text-white">
        <!-- Background Image with Stronger Blur -->
        <div class="absolute inset-0 z-0">
            <img src="/images/image.png" alt="Footer Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/70 backdrop-blur-md"></div>
        </div>
        
        <div class="relative z-10 mx-auto max-w-6xl px-4 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <!-- Logo and Description -->
                <div class="md:col-span-1">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-white rounded-2xl p-2 shadow-lg">
                            <img src="/images/untirta.png" alt="UNTIRTA Logo" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h3 class="font-bold text-white">Universitas <br> Sultan Ageng Tirtayasa</h3>
                        </div>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed mb-6">
                        Platform buat mahasiswa dan dosen.
                    </p>
                    <div class="flex gap-3">
                        <a href="https://www.facebook.com/untirtabantenofficial" class="w-10 h-10 bg-white/10 hover:bg-blue-600 rounded-lg flex items-center justify-center transition duration-300">
                            <i data-lucide="facebook" class="h-5 w-5"></i>
                        </a>
                        <a href="https://www.instagram.com/untirta_official/" class="w-10 h-10 bg-white/10 hover:bg-pink-600 rounded-lg flex items-center justify-center transition duration-300">
                            <i data-lucide="instagram" class="h-5 w-5"></i>
                        </a>
                        <a href="https://x.com/HumasUntirta" class="w-10 h-10 bg-white/10 hover:bg-blue-400 rounded-lg flex items-center justify-center transition duration-300">
                            <i data-lucide="twitter" class="h-5 w-5"></i>
                        </a>
                        <a href="https://youtube.com/@untirtaofficial?si=EvDCtrTv6AqnDqSd" class="w-10 h-10 bg-white/10 hover:bg-red-600 rounded-lg flex items-center justify-center transition duration-300">
                            <i data-lucide="youtube" class="h-5 w-5"></i>
                        </a>
                    </div>
                </div>

                <!-- Product Categories -->
                <div>
                    <h4 class="font-bold mb-6 text-lg border-l-4 border-[#FFE05E] pl-3">Fakultas</h4>
                    <ul class="space-y-3">
                        <li><a href="https://ft.untirta.ac.id/" class="text-gray-300 hover:text-[#FFE05E] transition duration-200 text-sm flex items-center gap-2"><i data-lucide="chevron-right" class="h-3 w-3"></i> Fakultas Teknik</a></li>
                        <li><a href="https://feb.untirta.ac.id/" class="text-gray-300 hover:text-[#FFE05E] transition duration-200 text-sm flex items-center gap-2"><i data-lucide="chevron-right" class="h-3 w-3"></i> Fakultas Ekonomi dan Bisnis</a></li>
                        <li><a href="https://fkip.untirta.ac.id/" class="text-gray-300 hover:text-[#FFE05E] transition duration-200 text-sm flex items-center gap-2"><i data-lucide="chevron-right" class="h-3 w-3"></i> Fakultas Keguruan dan Ilmu Pendidikan</a></li>
                        <li><a href="https://faperta.untirta.ac.id/" class="text-gray-300 hover:text-[#FFE05E] transition duration-200 text-sm flex items-center gap-2"><i data-lucide="chevron-right" class="h-3 w-3"></i> Fakultas Pertanian</a></li>
                        <li><a href="https://fisip.untirta.ac.id/" class="text-gray-300 hover:text-[#FFE05E] transition duration-200 text-sm flex items-center gap-2"><i data-lucide="chevron-right" class="h-3 w-3"></i> Fakultas Ilmu Sosial dan Politik</a></li>
                        <li><a href="https://fh.untirta.ac.id/" class="text-gray-300 hover:text-[#FFE05E] transition duration-200 text-sm flex items-center gap-2"><i data-lucide="chevron-right" class="h-3 w-3"></i> Fakultas Hukum</a></li>
                        <li><a href="https://fkik.untirta.ac.id/" class="text-gray-300 hover:text-[#FFE05E] transition duration-200 text-sm flex items-center gap-2"><i data-lucide="chevron-right" class="h-3 w-3"></i> Fakultas Kedokteran dan Ilmu Kesehatan</a></li>
                        <li><a href="https://pascasarjana.untirta.ac.id/" class="text-gray-300 hover:text-[#FFE05E] transition duration-200 text-sm flex items-center gap-2"><i data-lucide="chevron-right" class="h-3 w-3"></i> Program Pascasarjana</a></li>
                    </ul>
                </div>

                <!-- Company Links -->
                

                <!-- Contact & Support -->
                <div>
                    <h4 class="font-bold mb-6 text-lg border-l-4 border-[#FFE05E] pl-3">Kontak & Bantuan</h4>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <i data-lucide="map-pin" class="h-5 w-5 text-[#FFE05E] mt-0.5"></i>
                            <div>
                                <p class="text-white text-sm font-medium">Alamat</p>
                                <p class="text-gray-300 text-sm">Jl. Raya Palka Km 3 Sindangsari, Pabuaran,<br>Kab. Serang Provinsi Banten.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i data-lucide="phone" class="h-5 w-5 text-[#FFE05E] mt-0.5"></i>
                            <div>
                                <p class="text-white text-sm font-medium">Telepon</p>
                                <p class="text-gray-300 text-sm">+62254 3204321</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i data-lucide="mail" class="h-5 w-5 text-[#FFE05E] mt-0.5"></i>
                            <div>
                                <p class="text-white text-sm font-medium">Email</p>
                                <p class="text-gray-300 text-sm">humas@untirta.ac.id</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <i data-lucide="clock" class="h-5 w-5 text-[#FFE05E] mt-0.5"></i>
                            <div>
                                <p class="text-white text-sm font-medium">Jam Operasional</p>
                                <p class="text-gray-300 text-sm">Senin - Minggu: 08.00 - 22.00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="border-t border-gray-700 mt-12 pt-8 text-center">
                <p class="text-gray-400 text-sm">
                    &copy; 2024 <span class="text-[#FFE05E]">Sikakang</span> - Platform untirta. 
                    All rights reserved. | 
                    <span class="text-gray-300">Developed with love by kelompok berapa ini kita</span>
                </p>
            </div>
        </div>
    </footer>
   

    <style>
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 30s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>
</html>
