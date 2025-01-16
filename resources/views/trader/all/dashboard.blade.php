<x-trader.all.layout>
    <x-slot name="header">
        Business Dashboard
    </x-slot>
    
    <x-slot name="headerActions">
        <button onclick="openCreateModal()" class="bg-closeryellow hover:bg-closeryellow/90 text-white px-4 py-2 rounded-lg">
            Create New Business
        </button>
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
            <h3 class="text-xl font-semibold mb-4">My Businesses</h3>
            @if(isset($businesses) && $businesses->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($businesses as $business)
                    <div class="border rounded-lg p-4 hover:shadow-lg transition-shadow">
                    <div class="flex justify-end mb-2">
        @if($business->status === 'active')
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                <span class="w-2 h-2 mr-1 bg-green-400 rounded-full"></span>
                Active
            </span>
        @else
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                <span class="w-2 h-2 mr-1 bg-gray-400 rounded-full"></span>
                Inactive
            </span>
        @endif
    </div>
                    <!-- Business Logo and Main Photo -->
    <div class="relative">
        <img src="{{ asset('storage/' . $business->photo) }}" 
             alt="{{ $business->name }}" 
             class="w-full h-48 object-cover rounded-lg mb-4">
        <img src="{{ asset('storage/' . $business->logo) }}"
             alt="{{ $business->name }} Logo"
             class="absolute top-2 left-2 w-16 h-16 rounded-full border-2 border-white object-cover shadow-lg">
    </div>

    <!-- Business Details -->
    <h4 class="font-semibold text-lg mb-2">{{ $business->name }}</h4>
    <p class="text-gray-600 mb-4">{{ Str::limit($business->description, 100) }}</p>
    <div class="flex justify-between items-center">
        <span class="text-sm text-gray-500">{{ $business->location }}</span>
        <div class="space-x-2">
            <a href="{{ route('business.edit', $business) }}" 
               class="text-blue-500 hover:text-blue-700">Edit</a>
            <a href="{{ route('business.dashboard', $business) }}" 
               class="text-closeryellow hover:text-closeryellow/90">View</a>
        </div>
    </div>
</div>

                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-600 mb-4">You haven't created any businesses yet.</p>
                    <a href="javascript:openCreateModal()"
                        class="bg-closeryellow hover:bg-closeryellow/90 text-white px-6 py-3 rounded-lg inline-block">
                        Create Your First Business
                    </a>
                </div>
            @endif
        </div>
    </div>
     <!-- Create Business Modal -->
    <!-- Create Business Modal -->
<div id="createBusinessModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-[600px] shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Create New Business</h3>
            <form id="createBusinessForm" class="space-y-4">
        <!-- Basic Information Section -->
<div class="space-y-6">
    <!-- Business Details -->
    <div class="space-y-6 border rounded-lg p-4 bg-gray-50">
        <h4 class="font-medium text-gray-900">Business Details</h4>

        <div class="grid grid-cols-2 gap-4">
            <div class="relative">
                <label class="block text-sm font-medium text-gray-700">Business Name <span class="text-red-500">*</span></label>
                <input type="text" 
                    name="name" 
                    required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-closeryellow focus:ring focus:ring-closeryellow focus:ring-opacity-50">
                <span class="text-xs text-gray-500 mt-1 block">Enter your official business name</span>
            </div>
            
            <div class="relative">
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-closeryellow focus:ring focus:ring-closeryellow focus:ring-opacity-50">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                <span class="text-xs text-gray-500 mt-1 block">Set your business visibility</span>
            </div>
        </div>

        <div class="relative">
            <label class="block text-sm font-medium text-gray-700">Description <span class="text-red-500">*</span></label>
            <textarea 
                name="description" 
                required 
                rows="3" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-closeryellow focus:ring focus:ring-closeryellow focus:ring-opacity-50"></textarea>
            <span class="text-xs text-gray-500 mt-1 block">Describe your business, services, and unique offerings</span>
        </div>
    </div>

<!-- Location Information -->
<div class="grid grid-cols-3 gap-4">
    <div class="space-y-2">
        <x-input-label for="country" :value="__('Country')" class="text-gray-700 font-semibold"/>
        <select id="country" name="country" class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" required>
            <option value="rwanda" selected>Rwanda</option>
            <option value="" disabled>Other Countries (Coming Soon)</option>
        </select>
        <x-input-error :messages="$errors->get('country')" class="mt-2" />
    </div>

    <div class="space-y-2">
        <x-input-label for="province" :value="__('Province')" class="text-gray-700 font-semibold"/>
        <select id="province" name="province" class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" required>
            <option value="">Select Province</option>
        </select>
        <x-input-error :messages="$errors->get('province')" class="mt-2" />
    </div>

    <div class="space-y-2">
        <x-input-label for="district" :value="__('District')" class="text-gray-700 font-semibold"/>
        <select id="district" name="district" class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" required>
            <option value="">Select District</option>
        </select>
        <x-input-error :messages="$errors->get('district')" class="mt-2" />
    </div>
</div>

<div class="grid grid-cols-3 gap-4">
    <div class="space-y-2">
        <x-input-label for="sector" :value="__('Sector')" class="text-gray-700 font-semibold"/>
        <select id="sector" name="sector" class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" required>
            <option value="">Select Sector</option>
        </select>
        <x-input-error :messages="$errors->get('sector')" class="mt-2" />
    </div>
                    
    <div class="space-y-2">
        <x-input-label for="cell" :value="__('Cell')" class="text-gray-700 font-semibold"/>
        <select id="cell" name="cell" class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" required>
            <option value="">Select Cell</option>
        </select>
        <x-input-error :messages="$errors->get('cell')" class="mt-2" />
    </div>

    <div class="space-y-2">
        <x-input-label for="village" :value="__('Village')" class="text-gray-700 font-semibold"/>
        <select id="village" name="village" class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" required>
            <option value="">Select Village</option>
        </select>
        <x-input-error :messages="$errors->get('village')" class="mt-2" />
    </div>
</div>
<!-- map link-->
<div class="relative">
    <label class="block text-sm font-medium text-gray-700">Google Maps Location <span class="text-red-500">*</span></label>
    <div class="mt-1 flex rounded-md shadow-sm">
        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </span>
        <input type="url" 
            name="map_link" 
            required 
            placeholder="https://maps.google.com/..."
            class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 focus:border-closeryellow focus:ring focus:ring-closeryellow focus:ring-opacity-50">
    </div>
    <span class="text-xs text-gray-500 mt-1 block">Paste your Google Maps share link here</span>
</div>


            <!-- Image Uploads -->
<div class="space-y-6 border rounded-lg p-4 bg-gray-50">
    <h4 class="font-medium text-gray-900">Business Images</h4>
    
    <div class="grid grid-cols-2 gap-6">
        <!-- Logo Upload -->
        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 hover:border-closeryellow transition-colors">
            <label class="block">
                <span class="text-sm font-medium text-gray-700">Business Logo <span class="text-red-500">*</span></span>
                <span class="block text-xs text-gray-500 mt-1">Max: 2MB | PNG, JPG, JPEG</span>
                <input type="file" 
                    name="logo" 
                    required 
                    accept=".png,.jpg,.jpeg" 
                    class="mt-2 block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-closeryellow file:text-white
                    hover:file:bg-closeryellow/90">
            </label>
        </div>

        <!-- Main Photo Upload -->
        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 hover:border-closeryellow transition-colors">
            <label class="block">
                <span class="text-sm font-medium text-gray-700">Main Photo <span class="text-red-500">*</span></span>
                <span class="block text-xs text-gray-500 mt-1">Max: 5MB | PNG, JPG, JPEG</span>
           
           
                <input type="file" 
                    name="photo" 
                    required 
                    accept=".png,.jpg,.jpeg" 
                    class="mt-2 block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-closeryellow file:text-white
                    hover:file:bg-closeryellow/90">
            </label>
        </div>
    </div>

    <!-- Additional Photos -->
    <div class="space-y-3">
        <h5 class="text-sm font-medium text-gray-700">Additional Photos <span class="text-gray-500 text-xs">(Optional)</span></h5>
        <div class="grid grid-cols-2 gap-4">
            @foreach(range(1, 4) as $index)
                <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 hover:border-closeryellow transition-colors">
                    <label class="block">
                        <span class="text-sm font-medium text-gray-700">Photo {{ $index }}</span>
                        <span class="block text-xs text-gray-500 mt-1">Max: 5MB | PNG, JPG, JPEG</span>
                        <input type="file" 
                            name="photo{{ $index }}" 
                            accept=".png,.jpg,.jpeg" 
                            class="mt-2 block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-closeryellow file:text-white
                            hover:file:bg-closeryellow/90">
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>


                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeCreateModal()" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-closeryellow hover:bg-closeryellow/90 text-white rounded-lg">Create Business</button>
                </div>
            </form>
        </div>
    </div>
</div>

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="module" src="{{ asset('js/location.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function openCreateModal() {
            document.getElementById('createBusinessModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createBusinessModal').classList.add('hidden');
        }

        document.getElementById('createBusinessForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const result = await Swal.fire({
                title: 'Create Business?',
                text: 'This will create a new business listing',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#F59E0B',
                cancelButtonColor: '#6B7280',
                confirmButtonText: 'Yes, create it!'
            });

            if (result.isConfirmed) {
                const formData = new FormData(this);

                Swal.fire({
                    title: 'Creating Business...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                try {
                    const response = await fetch('/trader/businesses', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    const data = await response.json();

                    if (response.ok) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Business created successfully',
                            icon: 'success',
                            confirmButtonColor: '#F59E0B'
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        throw new Error(data.message || 'Something went wrong');
                    }
                } catch (error) {
                    Swal.fire({
                        title: 'Error!',
                        text: error.message,
                        icon: 'error',
                        confirmButtonColor: '#F59E0B'
                    });
                }
            }
        });
    </script>
    @endpush
</x-trader.all.layout>
