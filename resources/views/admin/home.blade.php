@extends('layouts.app') {{-- Assuming you have a main layout file --}}

@section('content')
    <div class="container mx-auto px-4 ">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-6">
            <!-- Total Paslons -->
            <div class="bg-white shadow rounded-lg p-6 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Total Paslons</h2>
                    <p class="text-3xl font-bold">{{ $totalPaslons }}</p>
                </div>
                <div class="text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 17h5l-1.4-1.4m0 0A8.033 8.033 0 009 5a8.033 8.033 0 00-4.6 10.6m4.6-10.6v.01V5v-.01z" />
                    </svg>
                </div>
            </div>

            <!-- Total Voters -->
            <div class="bg-white shadow rounded-lg p-6 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Total Voters</h2>
                    <p class="text-3xl font-bold">{{ $totalVoters }}</p>
                </div>
                <div class="text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 11c0 2.761-2.239 5-5 5S2 13.761 2 11 4.239 6 7 6s5 2.239 5 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M22 11c0 2.761-2.239 5-5 5s-5-2.239-5-5 2.239-5 5-5 5 2.239 5 5z" />
                    </svg>
                </div>
            </div>

            <!-- Total Votes -->
            <div class="bg-white shadow rounded-lg p-6 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Total Votes</h2>
                    <p class="text-3xl font-bold">{{ $totalVotes }}</p>
                </div>
                <div class="text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 17h5l-1.4-1.4m0 0A8.033 8.033 0 009 5a8.033 8.033 0 00-4.6 10.6m4.6-10.6v.01V5v-.01z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Charts -->
        @if ($categoriesData->isEmpty())
            <p class="text-center text-gray-600">No voting data available.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($categoriesData as $category)
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-lg font-semibold text-gray-700 mb-4">{{ $category['kategori'] }}</h2>
                        <canvas id="chart-{{ $loop->index }}" class="max-w-xs mx-auto"></canvas>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoriesData = @json($categoriesData);
        categoriesData.forEach((category, index) => {
            const ctx = document.getElementById(`chart-${index}`).getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: category.paslons.map(paslon => paslon.name),
                    datasets: [{
                        label: 'Votes',
                        data: category.paslons.map(paslon => paslon.votes),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        },
                    }
                }
            });
        });
    });
</script>
