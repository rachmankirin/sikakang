<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard Dosen')</title>

    <!-- Scripts & CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    <div class="flex h-screen">
        {{-- Sidebar untuk Dosen --}}
        {{-- Anda mungkin perlu membuat atau menyesuaikan komponen sidebar ini --}}
        <x-sidebar-dosen />

        {{-- Konten Utama --}}
        <main class="flex-1 ml-0 sm:ml-64 p-4 sm:p-6 overflow-y-auto">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="mb-6">
                    <h1 class="text-2xl font-semibold text-gray-900">
                        {{ $header }}
                    </h1>
                </header>
            @endif

            <!-- Page Content -->
            {{ $slot }}
        </main>
    </div>
    @stack('scripts')
</body>

</html>