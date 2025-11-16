@props(['matakuliah', 'kode', 'sks', 'waktu', 'ruangan', 'dosen', 'color' => 'blue'])

@php
    $colors = [
        'blue' => [
            'border' => 'border-blue-500',
            'bg' => 'bg-blue-100',
            'icon' => 'text-blue-600',
            'link' => 'text-blue-600 hover:text-blue-700'
        ],
        'purple' => [
            'border' => 'border-purple-500',
            'bg' => 'bg-purple-100',
            'icon' => 'text-purple-600',
            'link' => 'text-purple-600 hover:text-purple-700'
        ],
        'green' => [
            'border' => 'border-green-500',
            'bg' => 'bg-green-100',
            'icon' => 'text-green-600',
            'link' => 'text-green-600 hover:text-green-700'
        ],
        'orange' => [
            'border' => 'border-orange-500',
            'bg' => 'bg-orange-100',
            'icon' => 'text-orange-600',
            'link' => 'text-orange-600 hover:text-orange-700'
        ],
        'red' => [
            'border' => 'border-red-500',
            'bg' => 'bg-red-100',
            'icon' => 'text-red-600',
            'link' => 'text-red-600 hover:text-red-700'
        ],
    ];
    
    $currentColor = $colors[$color] ?? $colors['blue'];
@endphp

<div class="bg-white border-l-4 {{ $currentColor['border'] }} rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-5">
    <div class="flex justify-between items-start mb-3">
        <div class="flex items-center gap-2">
            <div class="{{ $currentColor['bg'] }} p-2 rounded-lg">
                {{ $icon ?? '' }}
            </div>
            <div>
                <h3 class="font-bold text-gray-900 text-lg">{{ $matakuliah }}</h3>
                <p class="text-sm text-gray-500">{{ $kode }}</p>
            </div>
        </div>
        <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">{{ $sks }} SKS</span>
    </div>
    
    <div class="space-y-2">
        <div class="flex items-center gap-2 text-gray-600">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="text-sm font-medium">{{ $waktu }}</span>
        </div>
        <div class="flex items-center gap-2 text-gray-600">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <span class="text-sm">{{ $ruangan }}</span>
        </div>
        <div class="flex items-center gap-2 text-gray-600">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <span class="text-sm">{{ $dosen }}</span>
        </div>
    </div>
    
    <div class="mt-4 pt-3 border-t border-gray-200">
        <a href="/jadwal/detail/{{ $kode }}" class="inline-flex items-center text-sm font-semibold {{ $currentColor['link'] }}">
            Lihat Detail
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</div>
