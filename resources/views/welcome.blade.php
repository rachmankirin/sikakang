<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <title></title>
</head>

<body>
    <x-sidebar></x-sidebar>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
