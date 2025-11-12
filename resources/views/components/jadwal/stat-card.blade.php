@props(['title', 'value', 'color' => 'blue'])

@php
    $colors = [
        'blue' => 'from-blue-50 to-blue-100 border-blue-200',
        'green' => 'from-green-50 to-green-100 border-green-200',
        'yellow' => 'from-yellow-50 to-yellow-100 border-yellow-200',
    ];
    
    $iconColors = [
        'blue' => 'bg-blue-500',
        'green' => 'bg-green-500',
        'yellow' => 'bg-yellow-500',
    ];
    
    $currentColor = $colors[$color] ?? $colors['blue'];
    $currentIconColor = $iconColors[$color] ?? $iconColors['blue'];
@endphp

<div class="bg-gradient-to-br {{ $currentColor }} border rounded-lg p-4 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
    <div class="flex items-center gap-3">
        <div class="{{ $currentIconColor }} p-3 rounded-lg">
            {{ $icon }}
        </div>
        <div>
            <p class="text-sm text-gray-600 font-medium">{{ $title }}</p>
            <p class="text-2xl font-bold text-gray-900">{{ $value }}</p>
        </div>
    </div>
</div>
