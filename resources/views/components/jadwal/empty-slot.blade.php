<div class="bg-gradient-to-br from-gray-50 to-gray-100 border-2 border-dashed border-gray-300 rounded-lg p-5 flex items-center justify-center">
    <div class="text-center">
        <svg class="w-16 h-16 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <p class="text-gray-500 font-medium">Waktu Luang</p>
        <p class="text-sm text-gray-400 mt-1">{{ $slot ?? 'Tidak ada jadwal' }}</p>
    </div>
</div>
