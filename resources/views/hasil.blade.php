@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 rounded-lg bg-white">
        <h1 class="text-3xl font-bold text-center">Voting Results</h1>
        <form method="GET" action="{{ route('hasil') }}" class="">
            <label for="kategori" class="block mb-2 text-sm  font-medium text-gray-900">Select Kategori:</label>
            <select name="kategori_id" id="kategori"
                class="block w-full p-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-300">
                <option value="">Choose a Kategori</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $selectedKategoriId == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="my-2 px-4 py-2 bg-blue-500 text-white rounded-lg">Show Results</button>
            <a href="{{ route('results.pdf', ['kategori_id' => $selectedKategoriId]) }}" class="px-4 py-2 bg-green-500 text-white rounded-lg">Download PDF</a>
        </form>

            


        @if ($selectedKategori)
            <div class="mt-6">
                <h2 class="text-lg font-semibold mb-2">{{ $selectedKategori->name }} Voting Results</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-2 px-4 border-b">Paslon</th>
                                <th class="py-2 px-4 border-b">Votes</th>
                                <th class="py-2 px-4 border-b">Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($selectedKategori->paslons as $paslon)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $paslon->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $paslon->votes_count }}</td>
                                    @php
                                        $totalVotes = $selectedKategori->paslons->sum('votes_count');
                                    @endphp

                                    <td class="py-2 px-4 border-b">
                                        @if ($totalVotes > 0)
                                            {{ number_format(($paslon->votes_count / $totalVotes) * 100, 2) }}%
                                        @else
                                            0%
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-6">
                    <canvas id="chart{{ $selectedKategori->id }}" height="500"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var ctx = document.getElementById('chart{{ $selectedKategori->id }}').getContext('2d');
                            new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: {!! json_encode($selectedKategori->paslons->pluck('name')) !!},
                                    datasets: [{
                                        data: {!! json_encode($selectedKategori->paslons->pluck('votes_count')) !!},
                                        backgroundColor: ['#4ade80', '#facc15', '#f87171', '#60a5fa', '#a78bfa'],
                                        hoverOffset: 4
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            display: true,
                                            position: 'bottom'
                                        },
                                        datalabels: {
                                            formatter: (value, context) => {
                                                let sum = 0;
                                                let dataArr = context.chart.data.datasets[0].data;
                                                dataArr.map(data => {
                                                    sum += data;
                                                });
                                                let percentage = (value * 100 / sum).toFixed(2) + "%";
                                                return percentage;
                                            },
                                            color: '#fff',
                                        }
                                    }
                                },
                            });
                        });
                    </script>
                </div>
            </div>
        @endif
    </div>
@endsection
