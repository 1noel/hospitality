<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Hospitality') }} - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/config.js'])

</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <x-trader.all.sidebar />
        
        <div class="flex-1 ml-64">
            <x-trader.all.header>
                <x-slot name="title">
                    {{ $header ?? 'Dashboard' }}
                </x-slot>
                
                @if(isset($headerActions))
                    <x-slot name="actions">
                        {{ $headerActions }}
                    </x-slot>
                @endif
            </x-trader.all.header>

            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
