<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
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
