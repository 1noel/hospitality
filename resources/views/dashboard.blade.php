<x-trader.all.layout>
    <x-slot name="header">
        Business Dashboard
    </x-slot>
    
    <x-slot name="headerActions">
        <a href="#" class="bg-closeryellow hover:bg-closeryellow/90 text-white px-4 py-2 rounded-lg">
            Create New Business
        </a>
    </x-slot>

    <!-- Business Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-2">Total Businesses</h3>
            <p class="text-3xl font-bold text-closeryellow">{{ $totalBusinesses ?? 0 }}</p>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-2">Active Listings</h3>
            <p class="text-3xl font-bold text-green-500">{{ $activeListings ?? 0 }}</p>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-2">Total Views</h3>
            <p class="text-3xl font-bold text-blue-500">{{ $totalViews ?? 0 }}</p>
        </div>
    </div>

    <!-- Business Listings -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <h3 class="text-xl font-semibold mb-4">Your Businesses</h3>
            @if(isset($businesses) && $businesses->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($businesses as $business)
                        <div class="border rounded-lg p-4 hover:shadow-lg transition-shadow">
                            <img src="{{ $business->image_url ?? asset('images/default-business.jpg') }}" 
                                 alt="{{ $business->name }}" 
                                 class="w-full h-48 object-cover rounded-lg mb-4">
                            <h4 class="font-semibold text-lg mb-2">{{ $business->name }}</h4>
                            <p class="text-gray-600 mb-4">{{ Str::limit($business->description, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">{{ $business->location }}</span>
                                <div class="space-x-2">
                                    <a href="{{ route('business.edit', $business) }}" 
                                       class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <a href="{{ route('business.show', $business) }}" 
                                       class="text-closeryellow hover:text-closeryellow/90">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-600 mb-4">You haven't created any businesses yet.</p>
                    <a href="#" 
                       class="bg-closeryellow hover:bg-closeryellow/90 text-white px-6 py-3 rounded-lg inline-block">
                        Create Your First Business
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-trader.all.layout>
