<x-trader.all.layout>
    <x-slot name="header">
        Edit Business: {{ $business->name }}
    </x-slot>

    <div class="bg-white rounded-lg shadow-sm p-6">
    <form id="editBusinessForm" class="space-y-6">

        @csrf

            <!-- Business Details -->
            <div class="space-y-6 border rounded-lg p-4 bg-gray-50">
              
        
                <h4 class="font-medium text-gray-900">Business Details</h4>

                <div class="grid grid-cols-2 gap-4">
                    <div class="relative">
                        <label class="block text-sm font-medium text-gray-700">Business Name <span class="text-red-500">*</span></label>
                        <input type="text" 
                            name="name" 
                            value="{{ old('name', $business->name) }}"
                            required 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-closeryellow focus:ring focus:ring-closeryellow focus:ring-opacity-50">
                    </div>
                    
                    <div class="relative">
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-closeryellow focus:ring focus:ring-closeryellow focus:ring-opacity-50">
                            <option value="active" {{ $business->status === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $business->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700">Description <span class="text-red-500">*</span></label>
                    <textarea 
                        name="description" 
                        required 
                        rows="3" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-closeryellow focus:ring focus:ring-closeryellow focus:ring-opacity-50">{{ old('description', $business->description) }}</textarea>
                </div>
            </div>

            <!-- Location Information -->
            <div class="space-y-6 border rounded-lg p-4 bg-gray-50">
                <h4 class="font-medium text-gray-900">Location Details</h4>

                <div class="grid grid-cols-3 gap-4">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Province <span class="text-red-500">*</span></label>
                        <select name="province" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-closeryellow focus:ring focus:ring-closeryellow focus:ring-opacity-50">
                            <option value="{{ $business->province }}" selected>{{ $business->province }}</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">District <span class="text-red-500">*</span></label>
                        <select name="district" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-closeryellow focus:ring focus:ring-closeryellow focus:ring-opacity-50">
                            <option value="{{ $business->district }}" selected>{{ $business->district }}</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Sector <span class="text-red-500">*</span></label>
                        <select name="sector" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-closeryellow focus:ring focus:ring-closeryellow focus:ring-opacity-50">
                            <option value="{{ $business->sector }}" selected>{{ $business->sector }}</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Cell <span class="text-red-500">*</span></label>
                        <select name="cell" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-closeryellow focus:ring focus:ring-closeryellow focus:ring-opacity-50">
                            <option value="{{ $business->cell }}" selected>{{ $business->cell }}</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Village <span class="text-red-500">*</span></label>
                        <select name="village" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-closeryellow focus:ring focus:ring-closeryellow focus:ring-opacity-50">
                            <option value="{{ $business->village }}" selected>{{ $business->village }}</option>
                        </select>
                    </div>
                </div>
            </div>

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
            value="{{$business->location}}"
            class="flex-1 block w-full rounded-none rounded-r-md border-gray-300 focus:border-closeryellow focus:ring focus:ring-closeryellow focus:ring-opacity-50">
    </div>
    <span class="text-xs text-gray-500 mt-1 block">Paste your Google Maps share link here</span>
</div>
<!-- Image Updates -->
<div class="space-y-6 border rounded-lg p-4 bg-gray-50">
    <h4 class="font-medium text-gray-900">Update Images</h4>
    
    <div class="grid grid-cols-2 gap-6">
        <!-- Logo Upload -->
        <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 hover:border-closeryellow transition-colors">
            <label class="block">
                <span class="text-sm font-medium text-gray-700">Business Logo</span>
                <span class="block text-xs text-gray-500 mt-1">Max: 2MB | PNG, JPG, JPEG</span>
                @if($business->logo)
                    <img src="{{ asset('storage/' . $business->logo) }}" class="w-32 h-32 object-cover rounded-lg mb-2">
                @endif
                <input type="file" 
                    name="logo" 
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
                <span class="text-sm font-medium text-gray-700">Main Photo</span>
                <span class="block text-xs text-gray-500 mt-1">Max: 5MB | PNG, JPG, JPEG</span>
                @if($business->photo)
                    <img src="{{ asset('storage/' . $business->photo) }}" class="w-32 h-32 object-cover rounded-lg mb-2">
                @endif
                <input type="file" 
                    name="photo" 
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
                        @if($business->{"photo{$index}"})
                            <img src="{{ asset('storage/' . $business->{"photo{$index}"}) }}" class="w-32 h-32 object-cover rounded-lg mb-2">
                        @endif
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
                <a href="{{ route('trader.dashboard') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-closeryellow hover:bg-closeryellow/90 text-white rounded-lg">Update Business</button>
            </div>
        </form>
    </div>
    <!-- push scripts -->
    @push('scripts')

     <!-- SweetAlert2 -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <!-- <script type="module" src="{{asset('js/location.js')}}"></script> -->
     <script>
document.getElementById('editBusinessForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const result = await Swal.fire({
        title: 'Update Business?',
        text: 'This will update your business information',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#F59E0B',
        cancelButtonColor: '#6B7280',
        confirmButtonText: 'Yes, update it!'
    });

    if (result.isConfirmed) {
        const formData = new FormData(this);
        formData.append('_method', 'PUT');

        Swal.fire({
            title: 'Updating Business...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        try {
            const businessId = `{{ $business->id }}`;
            const response = await fetch(`/trader/businesses/${businessId}`, {
    method: 'POST',
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    },
    body: formData
});


            const data = await response.text();

            if (response.ok) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Business updated successfully',
                    icon: 'success',
                    confirmButtonColor: '#F59E0B'
                }).then(() => {
                    window.location.href = '/trader/dashboard';
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
