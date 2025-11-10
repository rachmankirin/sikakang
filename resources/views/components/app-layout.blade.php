<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Mahasiswa')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-50 text-gray-800">
    <div class="flex h-screen">
        {{-- Sidebar --}}
        @include('components.sidebar.sidebar')

        {{-- Main content --}}
        <main class="flex-1 ml-0 sm:ml-64 p-4 sm:p-6 overflow-y-auto">
            {{ $slot }}
        </main>
    </div>
    @stack('scripts')
</body>

</html>
