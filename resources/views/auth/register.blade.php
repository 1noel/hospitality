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
            <option value="">Select Country</option>
            <option value="rwanda">Rwanda</option>
            <option value="kenya">Kenya</option>
            <option value="uganda">Uganda</option>
            <option value="tanzania">Tanzania</option>
            <option value="burundi">Burundi</option>
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
</div>


<div class="grid grid-cols-2 gap-4">
    <div class="space-y-2">
        <x-input-label for="district" :value="__('District')" class="text-gray-700 font-semibold"/>
        <select id="district" name="district" class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" required>
            <option value="">Select District</option>
        </select>
        <x-input-error :messages="$errors->get('district')" class="mt-2" />
    </div>

    <div class="space-y-2">
        <x-input-label for="sector" :value="__('Sector')" class="text-gray-700 font-semibold"/>
        <select id="sector" name="sector" class="block w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-closeryellow focus:border-closeryellow transition-colors" required>
            <option value="">Select Sector</option>
        </select>
        <x-input-error :messages="$errors->get('sector')" class="mt-2" />
    </div>
</div>

<div class="grid grid-cols-2 gap-4">
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
        const locationData = {
    rwanda: {
        provinces: {
            'kigali': {
                districts: {
                    'nyarugenge': {
                        sectors: ['gitega', 'kanyinya', 'kimisagara'],
                        cells: {
                            'gitega': ['villages'],
                            'kanyinya': ['villages'],
                            'kimisagara': ['villages']
                        }
                    },
                    'gasabo': {
                        sectors: ['gisozi', 'kimihurura', 'kimironko'],
                        cells: {
                            'gisozi': ['villages'],
                            'kimihurura': ['villages'],
                            'kimironko': ['villages']
                        }
                    }
                }
            },
            'eastern': {
                districts: {
                    'bugesera': {
                        sectors: ['nyamata', 'rilima', 'mayange'],
                        cells: {
                            'nyamata': ['villages'],
                            'rilima': ['villages'],
                            'mayange': ['villages']
                        }
                    }
                }
            }
        }
    },
    // Add other countries with similar structure
};

document.addEventListener('DOMContentLoaded', function() {
    const countrySelect = document.getElementById('country');
    const provinceSelect = document.getElementById('province');
    
    countrySelect.addEventListener('change', function() {
        const selectedCountry = this.value;
        updateProvinces(selectedCountry);
    });
});

function updateProvinces(country) {
    const provinceSelect = document.getElementById('province');
    provinceSelect.innerHTML = '<option value="">Select Province</option>';
    
    if (country && locationData[country]) {
        Object.keys(locationData[country].provinces).forEach(province => {
            const option = document.createElement('option');
            option.value = province;
            option.textContent = province.charAt(0).toUpperCase() + province.slice(1);
            provinceSelect.appendChild(option);
        });
    }
}
function updateDistricts(country, province) {
    const districtSelect = document.getElementById('district');
    districtSelect.innerHTML = '<option value="">Select District</option>';
    
    if (country && province && locationData[country].provinces[province]) {
        Object.keys(locationData[country].provinces[province].districts).forEach(district => {
            const option = document.createElement('option');
            option.value = district;
            option.textContent = district.charAt(0).toUpperCase() + district.slice(1);
            districtSelect.appendChild(option);
        });
    }
}

function updateSectors(country, province, district) {
    const sectorSelect = document.getElementById('sector');
    sectorSelect.innerHTML = '<option value="">Select Sector</option>';
    
    if (country && province && district && locationData[country].provinces[province].districts[district]) {
        locationData[country].provinces[province].districts[district].sectors.forEach(sector => {
            const option = document.createElement('option');
            option.value = sector;
            option.textContent = sector.charAt(0).toUpperCase() + sector.slice(1);
            sectorSelect.appendChild(option);
        });
    }
}

function updateCells(country, province, district, sector) {
    const cellSelect = document.getElementById('cell');
    cellSelect.innerHTML = '<option value="">Select Cell</option>';
    
    if (country && province && district && sector) {
        Object.keys(locationData[country].provinces[province].districts[district].cells[sector]).forEach(cell => {
            const option = document.createElement('option');
            option.value = cell;
            option.textContent = cell.charAt(0).toUpperCase() + cell.slice(1);
            cellSelect.appendChild(option);
        });
    }
}

function updateVillages(country, province, district, sector, cell) {
    const villageSelect = document.getElementById('village');
    villageSelect.innerHTML = '<option value="">Select Village</option>';
    
    if (country && province && district && sector && cell) {
        locationData[country].provinces[province].districts[district].cells[sector][cell].forEach(village => {
            const option = document.createElement('option');
            option.value = village;
            option.textContent = village.charAt(0).toUpperCase() + village.slice(1);
            villageSelect.appendChild(option);
        });
    }
}

// Add event listeners for all selects
document.getElementById('province').addEventListener('change', function() {
    const country = document.getElementById('country').value;
    updateDistricts(country, this.value);
});

document.getElementById('district').addEventListener('change', function() {
    const country = document.getElementById('country').value;
    const province = document.getElementById('province').value;
    updateSectors(country, province, this.value);
});

document.getElementById('sector').addEventListener('change', function() {
    const country = document.getElementById('country').value;
    const province = document.getElementById('province').value;
    const district = document.getElementById('district').value;
    updateCells(country, province, district, this.value);
});

document.getElementById('cell').addEventListener('change', function() {
    const country = document.getElementById('country').value;
    const province = document.getElementById('province').value;
    const district = document.getElementById('district').value;
    const sector = document.getElementById('sector').value;
    updateVillages(country, province, district, sector, this.value);
});

    </script>
@endsection
