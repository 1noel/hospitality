<x-trader.business.layout :business="$business">
  
<div class="space-y-6">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Products & Services</h2>
            <button onclick="openCreateModal()" class="bg-closeryellow hover:bg-closeryellow/90 text-white px-4 py-2 rounded-lg">
                Add New Product
            </button>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($products as $product)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                <img src="{{ asset('storage/' . $product->image1) }}" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-semibold text-gray-800 dark:text-white">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $product->category }}</p>
                        </div>
                        <span class="text-lg font-bold text-closeryellow">${{ $product->price }}</span>
                    </div>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">{{ Str::limit($product->description, 100) }}</p>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="px-2 py-1 text-xs rounded-full {{ $product->availability === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($product->availability) }}
                        </span>
                        <div class="space-x-2">
                            <button onclick="editProduct({{ $product->id }})" class="text-blue-500 hover:text-blue-700">Edit</button>
                            <button onclick="deleteProduct({{ $product->id }})" class="text-red-500 hover:text-red-700">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-gray-500 dark:text-gray-400">No products found.</p>
            @endforelse
        </div>

        
        <div id="createProductModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-[600px] shadow-lg rounded-md bg-white dark:bg-gray-800">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Add New Product</h3>
            <form id="createProductForm" class="space-y-4">
    <!-- Basic Information -->
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Name <span class="text-red-500">*</span>
                <span class="text-xs text-gray-500 block">Enter the product name as it should appear to customers</span>
            </label>
            <input type="text" name="name" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                SKU <span class="text-red-500">*</span>
                <span class="text-xs text-gray-500 block">Unique identifier for inventory tracking (e.g., TSHIRT-BLK-M (Black T-shirt, Medium size))</span>
            </label>
            <input type="text" name="sku" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            Description <span class="text-red-500">*</span>
            <span class="text-xs text-gray-500 block">Detailed description of the product features and benefits</span>
        </label>
        <textarea name="description" rows="3" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm"></textarea>
    </div>

    <!-- Pricing and Stock -->
    <div class="grid grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Price <span class="text-red-500">*</span>
                <span class="text-xs text-gray-500 block">Set the selling price</span>
            </label>
            <input type="number" step="0.01" name="price" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Stock Quantity <span class="text-red-500">*</span>
                <span class="text-xs text-gray-500 block">Current available quantity</span>
            </label>
            <input type="number" name="stock_quantity" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Brand (Optional)
                <span class="text-xs text-gray-500 block">Manufacturer or brand name</span>
            </label>
            <input type="text" name="brand" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
        </div>
    </div>

    <!-- Category and Unit -->
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Category <span class="text-red-500">*</span>
                <span class="text-xs text-gray-500 block">Product classification for organization</span>
            </label>
            <select name="category" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
                <option value="">Select Category</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="accessories">Accessories</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Unit (Optional)
                <span class="text-xs text-gray-500 block">Measurement unit (e.g., pieces, kg, liters)</span>
            </label>
            <input type="text" name="unit" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
        </div>
    </div>

    <!-- Weight and Features -->
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Weight (Optional)
                <span class="text-xs text-gray-500 block">Product weight in kilograms</span>
            </label>
            <input type="number" step="0.01" name="weight" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm">
        </div>
        <div class="flex items-center space-x-4 mt-6">
            <label class="flex items-center">
                <input type="checkbox" name="featured" class="rounded border-gray-300 dark:border-gray-600">
                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Featured Product</span>
            </label>
            <label class="flex items-center">
                <input type="checkbox" name="availability" checked class="rounded border-gray-300 dark:border-gray-600">
                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Available for Sale</span>
            </label>
        </div>
    </div>

    <!-- Images -->
    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Main Image <span class="text-red-500">*</span>
                <span class="text-xs text-gray-500 block">Primary product image (Max: 2MB, Format: JPG, PNG)</span>
            </label>
            <input type="file" name="image1" required accept="image/*" class="mt-1 block w-full">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Additional Image 1 (Optional)
                    <span class="text-xs text-gray-500 block">Secondary product view</span>
                </label>
                <input type="file" name="image2" accept="image/*" class="mt-1 block w-full">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Additional Image 2 (Optional)
                    <span class="text-xs text-gray-500 block">Additional product view</span>
                </label>
                <input type="file" name="image3" accept="image/*" class="mt-1 block w-full">
            </div>
        </div>
    </div>
    <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeCreateModal()" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-closeryellow hover:bg-closeryellow/90 text-white rounded-lg">Create Product</button>
                </div>
</form>

        </div>
    </div>
</div>


    </div>
    @push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function openCreateModal() {
    document.getElementById('createProductModal').classList.remove('hidden');
}

function closeCreateModal() {
    document.getElementById('createProductModal').classList.add('hidden');
}

    document.getElementById('createProductForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    // Show confirmation dialog
    const result = await Swal.fire({
        title: 'Create Product?',
        text: 'This will add a new product to your inventory',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#F59E0B',
        cancelButtonColor: '#6B7280',
        confirmButtonText: 'Yes, create it!'
    });

    if (result.isConfirmed) {
        const formData = new FormData(this);
        
        // Show loading state
        Swal.fire({
            title: 'Creating Product...',
            html: 'Please wait while we process your request',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        try {
            const businessId =  `{{$business->id}}`;
            const response = await fetch(`/trader/business/${businessId}/products`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    // 'Content-Type': 'multipart/form-data'
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Product created successfully',
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

</x-trader.business.layout>
