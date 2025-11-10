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
                        <span class="text-2xl font-bold text-gray-800">30%</span>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div class="w-full bg-gray-200 rounded-full h-3 mb-3">
                        <div class="bg-blue-500 h-3 rounded-full transition-all duration-300" style="width: 30%"></div>
                    </div>
                    
                    <p class="text-sm text-gray-600">12 of 16 lessons completed</p>
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
        <div class="space-y-4">
            
            <!-- Section 1 - Collapsed -->
            <div class="bg-white border-2 border-yellow-200 rounded-xl overflow-hidden">
                <button class="w-full flex items-center justify-between p-5 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-600 transform rotate-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-800">PERTEMUAN 1</h3>
                    </div>
                </button>
            </div>

            <!-- Section 2 - With Assignment -->
            <div class="bg-white border-2 border-yellow-200 rounded-xl overflow-hidden">
                <button class="w-full flex items-center justify-between p-5 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-600 transform rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                        <div class="text-left">
                            <h3 class="text-lg font-bold text-gray-800">Pengumpulan tugas</h3>
                            <p class="text-sm text-gray-500">Kumpulkan tugas anda</p>
                        </div>
                    </div>
                    <button class="px-6 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-semibold rounded-lg transition-colors">
                        Kumpulkan
                    </button>
                </button>
            </div>

            <!-- Section 3 - Expanded with Content -->
            <div class="bg-white border-2 border-yellow-200 rounded-xl overflow-hidden">
                <button class="w-full flex items-center justify-between p-5 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-600 transform rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-800">PERTEMUAN 1</h3>
                    </div>
                </button>
                
                <!-- Expanded Content -->
                <div class="px-5 pb-5 pt-2">
                    <p class="text-gray-600 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae neque fermentum magna suscipit elementum eu quis nunc. Sed sagittis auctor sodales. Nullam imperdiet malesuada risus, eget tristique felis. Integer ultrices vestibulum elit quis consequat. Mauris facilisis quis ipsum imperdiet eleifend. Vivamus eget velit luctus, congue justo ut, aliquam elit. Donec blandit leo quam, nec blandit sem convallis et. Morbi ultrices enim lobortis tortor scelerisque sodales.
                    </p>
                </div>
            </div>

            <!-- Section 4 - Another Expanded -->
            <div class="bg-white border-2 border-yellow-200 rounded-xl overflow-hidden">
                <button class="w-full flex items-center justify-between p-5 hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gray-600 transform rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                        <h3 class="text-lg font-bold text-gray-800">PERTEMUAN 1</h3>
                    </div>
                </button>
                
                <!-- Expanded Content -->
                <div class="px-5 pb-5 pt-2">
                    <p class="text-gray-600 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae neque fermentum magna suscipit elementum eu quis nunc. Sed sagittis auctor sodales. Nullam imperdiet malesuada risus, eget tristique felis. Integer ultrices vestibulum elit quis consequat. Mauris facilisis quis ipsum imperdiet eleifend. Vivamus eget velit luctus, congue justo ut, aliquam elit. Donec blandit leo quam, nec blandit sem convallis et. Morbi ultrices enim lobortis tortor scelerisque sodales.
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Alpine.js for Accordion (Optional) -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-app-layout>