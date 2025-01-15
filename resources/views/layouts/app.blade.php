<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/config.js'])
</head>
<body>
    <x-header>
        @yield('header-content')
    </x-header>

    <main>
        @yield('content')
    </main>

    <x-footer />
</body>
</html>
