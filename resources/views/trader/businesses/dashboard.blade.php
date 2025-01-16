<x-trader.business.layout :business="$business">

    <!-- Business Header Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white dark:bg-gray-800   rounded-lg p-6 shadow-sm">
    <h3 class="text-sm font-medium text-gray-500">Total Revenue</h3>
    <p class="text-2xl font-bold text-gray-900">
        ${{ $business->transactions()->exists() ? $business->transactions->sum('amount') : 0 }}
    </p>
</div>

<div class="bg-white dark:bg-gray-800  rounded-lg p-6 shadow-sm">
    <h3 class="text-sm font-medium text-gray-500">Total Bookings</h3>
    <p class="text-2xl font-bold text-gray-900">
        {{ $business->bookings()->count() ?? 0 }}
    </p>
</div>

<div class="bg-white dark:bg-gray-800  rounded-lg p-6 shadow-sm">
    <h3 class="text-sm font-medium text-gray-500">Active Products</h3>
    <p class="text-2xl font-bold text-gray-900">
        {{ $business->products()->where('availability', 'available')->count() ?? 0 }}
    </p>
</div>

<div class="bg-white dark:bg-gray-800  rounded-lg p-6 shadow-sm">
    <h3 class="text-sm font-medium text-gray-500">Total Employees</h3>
    <p class="text-2xl font-bold text-gray-900">
        {{ $business->employees()->count() ?? 0 }}
    </p>
</div>

    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Bookings -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800  rounded-lg shadow-sm p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Recent Bookings</h2>
                <a href="#" class="text-closeryellow hover:text-closeryellow/90">View all</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Customer</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Service</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Date/Time</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($business->bookings()->latest()->take(5)->get() as $booking)
                            <tr>
                                <td class="px-4 py-2">{{ $booking->user->name }}</td>
                                <td class="px-4 py-2">{{ $booking->service->name }}</td>
                                <td class="px-4 py-2">{{ $booking->date }} {{ $booking->time }}</td>
                                <td class="px-4 py-2">
                                    <span class="px-2 py-1 text-xs rounded-full 
                                        {{ $booking->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                           ($booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Top Products -->
        <div class="bg-white dark:bg-gray-800  rounded-lg shadow-sm p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Top Products</h2>
                <a href="#" class="text-closeryellow hover:text-closeryellow/90">Manage</a>
            </div>
            <div class="space-y-4">
                @foreach($business->products()->take(5)->get() as $product)
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $product->image1) }}" 
                             class="w-12 h-12 rounded-lg object-cover">
                        <div class="flex-1">
                            <h3 class="font-medium">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500">${{ $product->price }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs rounded-full {{ $product->availability === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($product->availability) }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Employee Performance -->
    <div class="mt-6 bg-white dark:bg-gray-800  rounded-lg shadow-sm p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Employee Performance</h2>
            <a href="#" class="text-closeryellow hover:text-closeryellow/90">Manage Team</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($business->employees()->take(4)->get() as $employee)
                <div class="p-4 border rounded-lg">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-medium">{{ $employee->name }}</h3>
                        <span class="text-sm {{ $employee->status === 'active' ? 'text-green-600' : 'text-red-600' }}">
                            ●
                        </span>
                    </div>
                    <p class="text-sm text-gray-500">{{ $employee->email }}</p>
                    <div class="mt-2">
                        <div class="flex justify-between text-sm">
                            <span>Performance</span>
                            <span>{{ $employee->performance_score }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                            <div class="bg-closeryellow h-2 rounded-full" style="width: {{ $employee->performance_score }}%"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
     // Theme toggle functionality
     const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Set initial theme
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    // Toggle theme
    document.getElementById('theme-toggle').addEventListener('click', function() {
        document.documentElement.classList.toggle('dark');
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');
        
        localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
    });

    // // Initialize revenue chart with dark mode support
    // const revenueChart = new Chart(
    //     document.getElementById('revenueChart'),
    //     {
    //         type: 'line',
    //         data: {
    //             labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
    //             datasets: [{
    //                 label: 'Monthly Revenue',
    //                 data: [12000, 19000, 15000, 25000, 22000, 30000],
    //                 borderColor: '#F59E0B',
    //                 tension: 0.4
    //             }]
    //         },
    //         options: {
    //             responsive: true,
    //             plugins: {
    //                 legend: {
    //                     position: 'bottom',
    //                     labels: {
    //                         color: document.documentElement.classList.contains('dark') ? '#fff' : '#000'
    //                     }
    //                 }
    //             },
    //             scales: {
    //                 y: {
    //                     ticks: {
    //                         color: document.documentElement.classList.contains('dark') ? '#fff' : '#000'
    //                     }
    //                 },
    //                 x: {
    //                     ticks: {
    //                         color: document.documentElement.classList.contains('dark') ? '#fff' : '#000'
    //                     }
    //                 }
    //             }
    //         }
    //     }
    // );
    // // Initialize revenue chart
    // const revenueChart = new Chart(
    //     document.getElementById('revenueChart'),
    //     {
    //         type: 'line',
    //         data: {
    //             labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
    //             datasets: [{
    //                 label: 'Monthly Revenue',
    //                 data: [12000, 19000, 15000, 25000, 22000, 30000],
    //                 borderColor: '#F59E0B',
    //                 tension: 0.4
    //             }]
    //         },
    //         options: {
    //             responsive: true,
    //             plugins: {
    //                 legend: {
    //                     position: 'bottom'
    //                 }
    //             }
    //         }
    //     }
    // );

    // Initialize bookings chart
    // const bookingsChart = new Chart(
    //     document.getElementById('bookingsChart'),
    //     {
    //         type: 'doughnut',
    //         data: {
    //             labels: ['Completed', 'Pending', 'Cancelled'],
    //             datasets: [{
    //                 data: [65, 25, 10],
    //                 backgroundColor: ['#10B981', '#F59E0B', '#EF4444']
    //             }]
    //         },
    //         options: {
    //             responsive: true,
    //             plugins: {
    //                 legend: {
    //                     position: 'bottom'
    //                 }
    //             }
    //         }
    //     }
    // );

    // // Dark mode support for charts
    // function updateChartsTheme(isDark) {
    //     const textColor = isDark ? '#fff' : '#374151';
    //     const gridColor = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';

    //     [revenueChart, bookingsChart].forEach(chart => {
    //         chart.options.scales = {
    //             ...chart.options.scales,
    //             x: { grid: { color: gridColor }, ticks: { color: textColor } },
    //             y: { grid: { color: gridColor }, ticks: { color: textColor } }
    //         };
    //         chart.options.plugins.legend.labels.color = textColor;
    //         chart.update();
    //     });
    // }

    // // Listen for theme changes
    // const observer = new MutationObserver((mutations) => {
    //     mutations.forEach((mutation) => {
    //         if (mutation.attributeName === 'class') {
    //             const isDark = document.documentElement.classList.contains('dark');
    //             updateChartsTheme(isDark);
    //         }
    //     });
    // });

    // observer.observe(document.documentElement, {
    //     attributes: true,
    //     attributeFilter: ['class']
    // });
</script>
@endpush

    </x-trader.business.layout>

