@props(['day'])

<div class="flex items-center gap-3 mb-4">
    <div class="bg-[#feffc4] px-4 py-2 rounded-lg border border-yellow-400">
        <h2 class="text-xl font-bold text-gray-900">{{ $day }}</h2>
    </div>
    <div class="flex-1 h-px bg-gray-300"></div>
</div>
