// Get the environment variables from window object
const apiEndpoint = window.config.apiEndpoint;
const apiKey = window.config.apiKey;


async function fetchLocations(endpoint) {
    const spinner = document.createElement('div');
    spinner.className = 'loading-spinner';
    
    try {
        const response = await fetch(`${apiEndpoint}${endpoint}`, {
            headers: {
                'X-RapidAPI-Key': apiKey,
                'X-RapidAPI-Host': 'rwanda.p.rapidapi.com'
            }
        });
        const data = await response.json();
        return data;
    } catch (error) {
        console.log('Error:', error);
        throw error;
    }
}

document.addEventListener('DOMContentLoaded', async () => {
    // Load provinces
    const provinces = await fetchLocations('provinces');
    const provinceSelect = document.getElementById('province');
    
    if (provinces.status === "success") {
        provinces.data.forEach(province => {
            provinceSelect.add(new Option(province, province));
        });
    }

   // Province change handler with loading state || district display
   provinceSelect.addEventListener('change', async (e) => {
    const districtSelect = document.getElementById('district');
    districtSelect.innerHTML = '<option value="">Loading districts...</option>';
    districtSelect.disabled = true;
    
    const spinner = document.createElement('div');
    spinner.className = 'loading-spinner';
    districtSelect.parentNode.appendChild(spinner);
    
    try {
        const response = await fetchLocations('districts');
        if (response.status === "success" && response.data) {
            districtSelect.innerHTML = '<option value="">Select District</option>';
            
            // Sort districts alphabetically
            const sortedDistricts = response.data.sort((a, b) => a.localeCompare(b));
            
            sortedDistricts.slice(0, 40).forEach(district => {
                districtSelect.add(new Option(district, district));
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


// District change handler with loading state || sector display
document.getElementById('district').addEventListener('change', async (e) => {
    const sectorSelect = document.getElementById('sector');
    sectorSelect.innerHTML = '<option value="">Loading sectors...</option>';
    sectorSelect.disabled = true;
    
    const spinner = document.createElement('div');
    spinner.className = 'loading-spinner';
    sectorSelect.parentNode.appendChild(spinner);
    
    try {
        const response = await fetchLocations('sectors');
        if (response.status === "success" && response.data) {
            sectorSelect.innerHTML = '<option value="">Select Sector</option>';
            // Sort sectors alphabetically
            const sortedSectors = response.data.sort((a, b) => a.localeCompare(b));
            sortedSectors.slice(0, 40).forEach(sector => {
                sectorSelect.add(new Option(sector, sector));
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


  // Sector change handler with loading state
document.getElementById('sector').addEventListener('change', async (e) => {
    const cellSelect = document.getElementById('cell');
    cellSelect.innerHTML = '<option value="">Loading cells...</option>';
    cellSelect.disabled = true;
    
    const spinner = document.createElement('div');
    spinner.className = 'loading-spinner';
    cellSelect.parentNode.appendChild(spinner);
    
    try {
        const response = await fetchLocations('cells');
        if (response.status === "success" && response.data) {
            cellSelect.innerHTML = '<option value="">Select Cell</option>';
            // Sort cells alphabetically
            const sortedCells = response.data.sort((a, b) => a.localeCompare(b));
            sortedCells.slice(0, 40).forEach(cell => {
                cellSelect.add(new Option(cell, cell));
            });
        }
    } catch (error) {
        console.log('Error fetching cells:', error);
        cellSelect.innerHTML = '<option value="">Error loading cells</option>';
    } finally {
        cellSelect.disabled = false;
        spinner.remove();
    }
});


// Cell change handler with optimized loading and search
document.getElementById('cell').addEventListener('change', async (e) => {
    const villageSelect = document.getElementById('village');
    villageSelect.innerHTML = '<option value="">Loading villages...</option>';
    villageSelect.disabled = true;
    
    const spinner = document.createElement('div');
    spinner.className = 'loading-spinner';
    villageSelect.parentNode.appendChild(spinner);
    
    try {
        const response = await fetchLocations('villages');
        if (response.status === "success" && response.data) {
            // Load first 40 villages initially
            villageSelect.innerHTML = '<option value="">Select Village</option>';
            response.data.slice(0, 40).forEach(village => {
                villageSelect.add(new Option(village, village));
            });

            // Initialize Select2 with all villages data
            $(villageSelect).select2({
                placeholder: 'Search village...',
                data: response.data.map(village => ({
                    id: village,
                    text: village
                })),
                allowClear: true,
                minimumInputLength: 1,
                width: '100%',
                theme: "classic"
            });
        }
    } catch (error) {
        console.log('Error fetching villages:', error);
        villageSelect.innerHTML = '<option value="">Error loading villages</option>';
    } finally {
        villageSelect.disabled = false;
        spinner.remove();
    }
});



});