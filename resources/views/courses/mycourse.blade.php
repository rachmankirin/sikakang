<x-app-layout>
    @section('title', 'My Courses')

    @section('content')
    <div class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Courses</h1>
                
                <div class="flex items-center gap-3">
                    <img src="" alt="Profile" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Admin</p>
                        <p class="text-xs text-gray-500">Student</p>
                    </div>
                </div>
            </div>

            <!-- Search & Filters Section -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-6 mb-6">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 mb-6">
                    
                    <!-- Search Bar -->
                    <div class="lg:col-span-5">
                        <div class="relative">
                            <svg class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text" placeholder="Search in your courses..." class="w-full bg-yellow-100 border-0 rounded-full pl-12 pr-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        </div>
                    </div>

                    <!-- Sort By Dropdown -->
                    <div class="lg:col-span-3">
                        <div class="relative">
                            <svg class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                            <select class="w-full bg-yellow-100 border-0 rounded-full pl-12 pr-10 py-3 text-sm font-medium text-gray-700 appearance-none focus:outline-none focus:ring-2 focus:ring-yellow-400 cursor-pointer">
                                <option>Sort by Last Accessed</option>
                                <option>Sort by Name</option>
                                <option>Sort by Date</option>
                            </select>
                        </div>
                    </div>

                    <!-- Category Filter Dropdown -->
                    <div class="lg:col-span-4">
                        <div class="relative">
                            <svg class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                            <select class="w-full bg-yellow-100 border-0 rounded-full pl-12 pr-10 py-3 text-sm font-medium text-gray-700 appearance-none focus:outline-none focus:ring-2 focus:ring-yellow-400 cursor-pointer">
                                <option>Mata Kuliah Wajib Informatika</option>
                                <option>Mata Kuliah Pilihan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Filter Tabs -->
                <div class="flex flex-wrap gap-6 text-sm font-medium">
                    <button class="text-yellow-600 border-b-2 border-yellow-600 pb-2 px-1">All</button>
                    <button class="text-gray-500 hover:text-gray-700 pb-2 px-1">In Progress</button>
                    <button class="text-gray-500 hover:text-gray-700 pb-2 px-1">Future</button>
                    <button class="text-gray-500 hover:text-gray-700 pb-2 px-1">Past</button>
                    <button class="text-gray-500 hover:text-gray-700 pb-2 px-1">Starred</button>
                    <button class="text-gray-500 hover:text-gray-700 pb-2 px-1">Removed From View</button>
                </div>
            </div>

            <!-- Course Grid -->
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                @for ($i = 0; $i < 6; $i++)
                    <a href="/incourse" class="bg-white border-2 border-yellow-200 rounded-2xl overflow-hidden hover:shadow-lg transition-shadow duration-300 cursor-pointer block">
                        
                        <!-- Course Image -->
                        <div class="bg-linear-to-br from-gray-800 to-gray-900 h-48 flex items-center justify-center p-6">
                            <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/java/java-original.svg" alt="Java Logo" class="h-32 w-32 object-contain">
                        </div>
                        
                        <!-- Course Info -->
                        <div class="p-5">
                            <span class="inline-block bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-1 rounded-full mb-3">
                                Mata Kuliah Wajib Informatika
                            </span>
                            
                            <h3 class="text-gray-800 font-bold text-lg mb-3">PEMROGRAMAN WEB</h3>
                            
                            <!-- Instructor -->
                            <div class="flex items-center gap-2 mb-2 text-sm text-gray-600">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>Yulian Ansori, S.Kom., M.Kom.</span>
                            </div>
                            
                            <!-- Participants -->
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <span>85 Participants</span>
                            </div>
                        </div>
                    </a>
                @endfor
            </div>

        </div>
    </div>  
</x-app-layout>