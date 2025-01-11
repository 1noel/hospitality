@extends('layouts.app')

@section('header-content')
    <div class="mx-20 absolute bottom-24">
        <h1 class="font-Inter text-white font-bold text-2xl">Create Your Account</h1>
    </div>
@endsection

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <img src="{{asset('images/logo.png')}}" alt="Logo" class="h-12 mx-auto mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Join Us Today!</h2>
                <p class="text-gray-600">Fill in your details to get started</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6 bg-white p-8 rounded-xl shadow-lg">
          @csrf

    <!-- Name -->
    <div class="space-y-2">
        <x-input-label for="name" :value="__('Name')" class="text-gray-700 font-semibold"/>
        <x-text-input id="name" 
            class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors"
            type="text"
            name="name"
            :value="old('name')"
            required
            autofocus
            placeholder="Enter your full name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="space-y-2">
        <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold"/>
        <x-text-input id="email"
            class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors"
            type="email"
            name="email"
            :value="old('email')"
            required
            placeholder="Enter your email address" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Phone Number -->
    <div class="space-y-2">
        <x-input-label for="phone_number" :value="__('Phone Number')" class="text-gray-700 font-semibold"/>
        <x-text-input id="phone_number"
            class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors"
            type="tel"
            name="phone_number"
            :value="old('phone_number')"
            required
            placeholder="Enter your phone number" />
        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
    </div>
<!-- Location Fields -->
<div class="grid grid-cols-2 gap-4">
    <div class="space-y-2">
        <x-input-label for="country" :value="__('Country')" class="text-gray-700 font-semibold"/>
        <select id="country" name="country" class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" required>
            <option value="rwanda">Rwanda</option>
        </select>
    </div>

    <div class="space-y-2">
        <x-input-label for="province" :value="__('Province')" class="text-gray-700 font-semibold"/>
        <select id="province" name="province" class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" required>
            <option value="">Select Province</option>
        </select>
    </div>
</div>

<div class="grid grid-cols-2 gap-4">
    <div class="space-y-2">
        <x-input-label for="district" :value="__('District')" class="text-gray-700 font-semibold"/>
        <select id="district" name="district" class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" required>
            <option value="">Select District</option>
        </select>
    </div>

    <div class="space-y-2">
        <x-input-label for="sector" :value="__('Sector')" class="text-gray-700 font-semibold"/>
        <select id="sector" name="sector" class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" required>
            <option value="">Select Sector</option>
        </select>
    </div>
</div>

<div class="grid grid-cols-2 gap-4">
    <div class="space-y-2">
        <x-input-label for="cell" :value="__('Cell')" class="text-gray-700 font-semibold"/>
        <select id="cell" name="cell" class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" required>
            <option value="">Select Cell</option>
        </select>
    </div>

    <div class="space-y-2">
        <x-input-label for="village" :value="__('Village')" class="text-gray-700 font-semibold"/>
        <select id="village" name="village" class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" required>
            <option value="">Select Village</option>
        </select>
    </div>
</div>



    <!-- Password -->
    <div class="space-y-2">
        <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold"/>
        <x-text-input id="password"
            class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors"
            type="password"
            name="password"
            required
            placeholder="Create a strong password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="space-y-2">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-semibold"/>
        <x-text-input id="password_confirmation"
            class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors"
            type="password"
            name="password_confirmation"
            required
            placeholder="Confirm your password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <button type="submit" class="w-full bg-closeryellow text-white py-3 rounded-lg font-semibold hover:bg-closeryellow/90 transition-colors">
        {{ __('Create Account') }}
    </button>

    <p class="text-center text-gray-600 text-sm">
        Already have an account? 
        <a href="{{ route('login') }}" class="text-closeryellow hover:text-closeryellow/90 font-semibold">Sign in</a>
    </p>
</form>

        </div>
    </div>
    

    <script>


const loadingSpinnerCSS = `
    <style>
        .loading-spinner {
            width: 20px;
            height: 20px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid #FFB800;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-left: 10px;
            display: inline-block;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
`;
document.head.insertAdjacentHTML('beforeend', loadingSpinnerCSS);
const apiEndpoint = 'https://rwanda.p.rapidapi.com/';
const apiKey = '6ff5880620mshfe20bd504d82c14p16f786jsn4741c513ceda'; // Replace with your actual API key

async function fetchLocations(endpoint) {
    const response = await fetch(`${apiEndpoint}${endpoint}`, {
        headers: {
            'X-RapidAPI-Key': apiKey,
            'X-RapidAPI-Host': 'rwanda.p.rapidapi.com'
        }
    });
    return await response.json();
}



document.addEventListener('DOMContentLoaded', async () => {
    // Add loading spinner CSS
    const loadingSpinnerCSS = `
        <style>
            .loading-spinner {
                width: 20px;
                height: 20px;
                border: 2px solid #f3f3f3;
                border-top: 2px solid #FFB800;
                border-radius: 50%;
                animation: spin 1s linear infinite;
                margin-left: 10px;
                display: inline-block;
            }
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>
    `;
    document.head.insertAdjacentHTML('beforeend', loadingSpinnerCSS);

    try {
        const response = await fetchLocations('provinces');
        const provinceSelect = document.getElementById('province');
        provinceSelect.innerHTML = '<option value="">Select Province</option>';
        
        if (response.status === "success" && response.data) {
            response.data.forEach(province => {
                provinceSelect.add(new Option(province, province));
            });
            
            // Initialize Select2 for province
            $(provinceSelect).select2({
                placeholder: 'Search province...',
                allowClear: true,
                width: '100%',
                theme: "classic"
            });
        }

        // Province change handler
        provinceSelect.addEventListener('change', async (e) => {
            const districtSelect = document.getElementById('district');
            districtSelect.innerHTML = '<option value="">Loading districts...</option>';
            districtSelect.disabled = true;
            
            const spinner = document.createElement('div');
            spinner.className = 'loading-spinner';
            districtSelect.parentNode.appendChild(spinner);

            try {
                const response = await fetchLocations('districts');
                districtSelect.innerHTML = '<option value="">Select District</option>';
                
                if (response.status === "success" && response.data) {
                    response.data.forEach(district => {
                        districtSelect.add(new Option(district, district));
                    });
                    
                    // Initialize Select2 for district
                    $(districtSelect).select2({
                        placeholder: 'Search district...',
                        allowClear: true,
                        width: '100%',
                        theme: "classic"
                    });
                }
            } catch (error) {
                console.log('Error fetching districts:', error);
                districtSelect.innerHTML = '<option value="">Error loading districts</option>';
            } finally {
                districtSelect.disabled = false;
                spinner.remove();
            }
        });
    } catch (error) {
        console.log('Error fetching provinces:', error);
    }
});

// District change handler with  search and loading state
document.getElementById('district').addEventListener('change', async (e) => {
    const sectorSelect = document.getElementById('sector');
    sectorSelect.innerHTML = '<option value="">Loading sectors...</option>';
    sectorSelect.disabled = true;
    
    // Add loading spinner
    const spinner = document.createElement('div');
    spinner.className = 'loading-spinner';
    sectorSelect.parentNode.appendChild(spinner);
    
    try {
        const response = await fetchLocations('sectors');
        if (response.status === "success" && response.data) {
            sectorSelect.innerHTML = '<option value="">Select Sector</option>';
            response.data.slice(0, 40).forEach(sector => {
                sectorSelect.add(new Option(sector, sector));
            });

            $(sectorSelect).select2({
                placeholder: 'Search sector...',
                data: response.data.map(sector => ({
                    id: sector,
                    text: sector
                })),
                allowClear: true,
                minimumInputLength: 1,
                width: '100%',
                theme: "classic"
            });
        }
    } catch (error) {
        console.log('Error fetching sectors:', error);
        sectorSelect.innerHTML = '<option value="">Error loading sectors</option>';
    } finally {
        sectorSelect.disabled = false;
        spinner.remove();
    }
});

// Sector change handler
document.getElementById('sector').addEventListener('change', async (e) => {
    try {
        const response = await fetchLocations('cells');
        const cellSelect = document.getElementById('cell');
        cellSelect.innerHTML = '<option value="">Select Cell</option>';
        
        if (response.status === "success" && response.data) {
            response.data.forEach(cell => {
                cellSelect.add(new Option(cell, cell));
            });
        }
    } catch (error) {
        console.log('Error fetching cells:', error);
    }
});

// Cell change handler with optimized loading and search
document.getElementById('cell').addEventListener('change', async (e) => {
    const villageSelect = document.getElementById('village');
    villageSelect.innerHTML = '<option value="">Select Village</option>';
    
    try {
        const response = await fetchLocations('villages');
        if (response.status === "success" && response.data) {
            const allVillages = response.data;
            
            // Load first 40 villages initially
            allVillages.slice(0, 1).forEach(village => {
                villageSelect.add(new Option(village, village));
            });

            // Initialize Select2 with all villages data
            $(villageSelect).select2({
                placeholder: 'Search village...',
                data: allVillages.map(village => ({
                    id: village,
                    text: village
                })),
                allowClear: true,
                minimumInputLength: 1,
                width: '100%',
                theme: "classic",
                templateResult: formatVillage
            });
        }
    } catch (error) {
        console.log('Error fetching villages:', error);
    }
});

// Custom formatting for village options
function formatVillage(village) {
    if (!village.id) return village.text;
    return $('<span>' + village.text + '</span>');
}

    </script>
@endsection
