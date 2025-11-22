<x-app-layout>

@section('title', 'Course Detail - Pemrograman Web')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Header Section -->
        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6 mb-8">
            
            <!-- Left: Course Info -->
            <div class="flex-1">
                <!-- Back Button -->
                <a href="/mycourse" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-800 mb-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span class="font-medium">Back to Courses</span>
                </a>

                <!-- Course Title -->
                <h1 class="text-3xl font-bold text-gray-800 mb-3">PEMROGRAMAN WEB</h1>
                
                <!-- Course Meta -->
                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>By Yulian Ansori, S.Kom., M.Kom.</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span>85 Participants</span>
                    </div>
                </div>
            </div>

            <!-- Right: Action Buttons & Progress -->
            <div class="flex flex-col gap-4">
                <!-- Action Buttons -->
                <div class="flex gap-3">
                    <button class="flex items-center gap-2 px-5 py-2.5 bg-yellow-100 hover:bg-yellow-200 text-gray-700 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        <span class="font-medium">Add to Favorites</span>
                    </button>
                    
                    <button class="flex items-center gap-2 px-5 py-2.5 bg-yellow-100 hover:bg-yellow-200 text-gray-700 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                        </svg>
                        <span class="font-medium">Share</span>
                    </button>
                </div>

                <!-- Course Progress Card -->
                <div class="bg-yellow-50 border-2 border-yellow-200 rounded-xl p-5">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-lg font-bold text-gray-700">Course Progress</h3>
                        <span id="progressPercentage" class="text-2xl font-bold text-gray-800">0%</span>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div class="w-full bg-gray-200 rounded-full h-3 mb-3">
                        <div id="progressBar" class="bg-blue-500 h-3 rounded-full transition-all duration-500" style="width: 0%"></div>
                    </div>
                    
                    <p id="progressText" class="text-sm text-gray-600">0 of 4 assignments completed</p>
                </div>
            </div>

        </div>

        <!-- Tabs -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
            <div class="flex border-b border-gray-200">
                <button class="flex items-center gap-2 px-6 py-4 text-yellow-600 border-b-2 border-yellow-600 font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <span>Course Content</span>
                </button>
                
                <button class="flex items-center gap-2 px-6 py-4 text-gray-600 hover:text-gray-800 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span>Grades</span>
                </button>
            </div>
        </div>

        <!-- Course Content Sections -->
        <div class="space-y-4" id="courseContent">
            
            <!-- Section 1 - Collapsed -->
            <div class="section-item bg-white border-2 border-yellow-200 rounded-xl overflow-hidden transform opacity-0 translate-y-4 transition-all duration-500">
                <button class="section-toggle w-full flex items-center justify-between p-5 hover:bg-gray-50 transition-colors" data-section="1">
                    <div class="flex items-center gap-3">
                        <svg class="arrow-icon w-5 h-5 text-gray-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-800">PERTEMUAN 1</h3>
                    </div>
                </button>
                <div class="section-content hidden">
                    <div class="px-5 pb-5 pt-2">
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Materi pertemuan pertama mengenai pengenalan pemrograman web dan dasar-dasar HTML.
                        </p>
                        
                        <!-- Upload Assignment Section -->
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Tugas Pertemuan 1</h4>
                            <p class="text-sm text-gray-600 mb-4">Upload tugas Anda dalam format PDF atau file dokumen lainnya (Max: 10MB)</p>
                            
                            <!-- File Upload Area (Show when no file uploaded) -->
                            <div class="upload-area space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih File</label>
                                    <input type="file" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.zip" 
                                           class="file-input block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-100 file:text-gray-700 hover:file:bg-yellow-200 cursor-pointer">
                                </div>
                                <button class="submit-btn w-full px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-semibold rounded-lg transition-colors">
                                    Kumpulkan Tugas
                                </button>
                            </div>

                            <!-- Submitted File Info (Hidden by default, show after submit) -->
                            <div class="submitted-file hidden">
                                <div class="bg-white border border-yellow-300 rounded-lg p-4 mb-3">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <div>
                                                <p class="filename font-semibold text-gray-800 text-sm">tugas_web_1.pdf</p>
                                                <p class="text-xs text-gray-500">Dikumpulkan pada 20 Nov 2025, 14:30</p>
                                            </div>
                                        </div>
                                        <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">Terkirim</span>
                                    </div>
                                </div>
                                <button class="change-file-btn w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    Ganti File
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2 - PERTEMUAN 2 -->
            <div class="section-item bg-white border-2 border-yellow-200 rounded-xl overflow-hidden transform opacity-0 translate-y-4 transition-all duration-500">
                <button class="section-toggle w-full flex items-center justify-between p-5 hover:bg-gray-50 transition-colors" data-section="2">
                    <div class="flex items-center gap-3">
                        <svg class="arrow-icon w-5 h-5 text-gray-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-800">PERTEMUAN 2</h3>
                    </div>
                </button>
                <div class="section-content hidden">
                    <div class="px-5 pb-5 pt-2">
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Pembahasan CSS dasar: selectors, properties, dan styling halaman web.
                        </p>
                        
                        <!-- Upload Assignment Section -->
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Tugas Pertemuan 2</h4>
                            <p class="text-sm text-gray-600 mb-4">Upload tugas Anda dalam format PDF atau file dokumen lainnya (Max: 10MB)</p>
                            
                            <!-- File Upload Area (Show when no file uploaded) -->
                            <div class="upload-area space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih File</label>
                                    <input type="file" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.zip" 
                                           class="file-input block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-100 file:text-gray-700 hover:file:bg-yellow-200 cursor-pointer">
                                </div>
                                <button class="submit-btn w-full px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-semibold rounded-lg transition-colors">
                                    Kumpulkan Tugas
                                </button>
                            </div>

                            <!-- Submitted File Info (Hidden by default, show after submit) -->
                            <div class="submitted-file hidden">
                                <div class="bg-white border border-yellow-300 rounded-lg p-4 mb-3">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <div>
                                                <p class="filename font-semibold text-gray-800 text-sm">tugas_web_2.pdf</p>
                                                <p class="text-xs text-gray-500">Dikumpulkan pada 20 Nov 2025, 14:30</p>
                                            </div>
                                        </div>
                                        <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">Terkirim</span>
                                    </div>
                                </div>
                                <button class="change-file-btn w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    Ganti File
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 3 - PERTEMUAN 3 -->
            <div class="section-item bg-white border-2 border-yellow-200 rounded-xl overflow-hidden transform opacity-0 translate-y-4 transition-all duration-500">
                <button class="section-toggle w-full flex items-center justify-between p-5 hover:bg-gray-50 transition-colors" data-section="3">
                    <div class="flex items-center gap-3">
                        <svg class="arrow-icon w-5 h-5 text-gray-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-800">PERTEMUAN 3</h3>
                    </div>
                </button>
                
                <div class="section-content hidden">
                    <div class="px-5 pb-5 pt-2">
                        <p class="text-gray-600 leading-relaxed mb-4">
                            JavaScript fundamental: variabel, tipe data, operator, dan struktur kontrol.
                        </p>
                        
                        <!-- Upload Assignment Section -->
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Tugas Pertemuan 3</h4>
                            <p class="text-sm text-gray-600 mb-4">Upload tugas Anda dalam format PDF atau file dokumen lainnya (Max: 10MB)</p>
                            
                            <!-- File Upload Area (Show when no file uploaded) -->
                            <div class="upload-area space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih File</label>
                                    <input type="file" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.zip" 
                                           class="file-input block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-100 file:text-gray-700 hover:file:bg-yellow-200 cursor-pointer">
                                </div>
                                <button class="submit-btn w-full px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-semibold rounded-lg transition-colors">
                                    Kumpulkan Tugas
                                </button>
                            </div>

                            <!-- Submitted File Info (Hidden by default, show after submit) -->
                            <div class="submitted-file hidden">
                                <div class="bg-white border border-yellow-300 rounded-lg p-4 mb-3">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <div>
                                                <p class="filename font-semibold text-gray-800 text-sm">tugas_web_3.pdf</p>
                                                <p class="text-xs text-gray-500">Dikumpulkan pada 20 Nov 2025, 14:30</p>
                                            </div>
                                        </div>
                                        <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">Terkirim</span>
                                    </div>
                                </div>
                                <button class="change-file-btn w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    Ganti File
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 4 - PERTEMUAN 4 -->
            <div class="section-item bg-white border-2 border-yellow-200 rounded-xl overflow-hidden transform opacity-0 translate-y-4 transition-all duration-500">
                <button class="section-toggle w-full flex items-center justify-between p-5 hover:bg-gray-50 transition-colors" data-section="4">
                    <div class="flex items-center gap-3">
                        <svg class="arrow-icon w-5 h-5 text-gray-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-800">PERTEMUAN 4</h3>
                    </div>
                </button>
                
                <div class="section-content hidden">
                    <div class="px-5 pb-5 pt-2">
                        <p class="text-gray-600 leading-relaxed mb-4">
                            DOM Manipulation dan Event Handling dalam JavaScript untuk interaksi web yang dinamis.
                        </p>
                        
                        <!-- Upload Assignment Section -->
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-3">Tugas Pertemuan 4</h4>
                            <p class="text-sm text-gray-600 mb-4">Upload tugas Anda dalam format PDF atau file dokumen lainnya (Max: 10MB)</p>
                            
                            <!-- File Upload Area (Show when no file uploaded) -->
                            <div class="upload-area space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih File</label>
                                    <input type="file" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.zip" 
                                           class="file-input block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-100 file:text-gray-700 hover:file:bg-yellow-200 cursor-pointer">
                                </div>
                                <button class="submit-btn w-full px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-semibold rounded-lg transition-colors">
                                    Kumpulkan Tugas
                                </button>
                            </div>

                            <!-- Submitted File Info (Hidden by default, show after submit) -->
                            <div class="submitted-file hidden">
                                <div class="bg-white border border-yellow-300 rounded-lg p-4 mb-3">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <div>
                                                <p class="filename font-semibold text-gray-800 text-sm">tugas_web_4.pdf</p>
                                                <p class="text-xs text-gray-500">Dikumpulkan pada 20 Nov 2025, 14:30</p>
                                            </div>
                                        </div>
                                        <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">Terkirim</span>
                                    </div>
                                </div>
                                <button class="change-file-btn w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    Ganti File
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Entrance animation for sections (staggered)
        const sections = document.querySelectorAll('.section-item');
        sections.forEach((section, index) => {
            setTimeout(() => {
                section.classList.remove('opacity-0', 'translate-y-4');
                section.classList.add('opacity-100', 'translate-y-0');
            }, index * 100);
        });

        // Accordion toggle functionality
        document.querySelectorAll('.section-toggle').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const sectionItem = this.closest('.section-item');
                const content = sectionItem.querySelector('.section-content');
                const arrow = this.querySelector('.arrow-icon');
                
                if (content.classList.contains('hidden')) {
                    // Open
                    content.classList.remove('hidden');
                    arrow.classList.add('rotate-180');
                } else {
                    // Close
                    content.classList.add('hidden');
                    arrow.classList.remove('rotate-180');
                }
            });
        });

        // Update progress bar
        function updateProgress() {
            const totalAssignments = 4;
            const submittedAssignments = document.querySelectorAll('.submitted-file:not(.hidden)').length;
            const percentage = Math.round((submittedAssignments / totalAssignments) * 100);
            
            document.getElementById('progressBar').style.width = percentage + '%';
            document.getElementById('progressPercentage').textContent = percentage + '%';
            document.getElementById('progressText').textContent = `${submittedAssignments} of ${totalAssignments} assignments completed`;
        }

        // File upload and change functionality
        document.querySelectorAll('.submit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const uploadSection = this.closest('.bg-yellow-50');
                const fileInput = uploadSection.querySelector('.file-input');
                const uploadArea = uploadSection.querySelector('.upload-area');
                const submittedArea = uploadSection.querySelector('.submitted-file');
                const filenameDisplay = uploadSection.querySelector('.filename');

                if (fileInput.files.length > 0) {
                    const fileName = fileInput.files[0].name;
                    
                    // Update filename in submitted area
                    if (filenameDisplay) {
                        filenameDisplay.textContent = fileName;
                    }

                    // Hide upload area, show submitted area
                    uploadArea.classList.add('hidden');
                    submittedArea.classList.remove('hidden');

                    // Update progress bar
                    updateProgress();

                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Tugas berhasil dikumpulkan!',
                        confirmButtonColor: '#f59e0b'
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan',
                        text: 'Silakan pilih file terlebih dahulu!',
                        confirmButtonColor: '#f59e0b'
                    });
                }
            });
        });

        // Change file button functionality
        document.querySelectorAll('.change-file-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const uploadSection = this.closest('.bg-yellow-50');
                const uploadArea = uploadSection.querySelector('.upload-area');
                const submittedArea = uploadSection.querySelector('.submitted-file');
                const fileInput = uploadSection.querySelector('.file-input');

                // Show upload area, hide submitted area
                submittedArea.classList.add('hidden');
                uploadArea.classList.remove('hidden');

                // Reset file input
                fileInput.value = '';

                // Update progress bar
                updateProgress();
            });
        });

        // Initialize progress on page load
        updateProgress();
    });
</script>

<!-- Alpine.js for Accordion (Optional) -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-app-layout>