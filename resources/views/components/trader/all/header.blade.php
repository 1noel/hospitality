<header class="bg-white shadow-sm">
    <div class="flex justify-between items-center px-4 py-4 sm:px-6 lg:px-8">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">{{ $title }}</h1>
            @if(isset($subtitle))
                <p class="mt-1 text-sm text-gray-600">{{ $subtitle }}</p>
            @endif
        </div>
        
        <div class="flex items-center space-x-4">
            {{ $actions ?? '' }}
        </div>
    </div>
</header>
