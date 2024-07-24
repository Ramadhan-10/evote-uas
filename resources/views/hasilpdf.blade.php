<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Voting</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Hasil Voting</h1>

    @if ($selectedKategori)
        <h2>Kategori: {{ $selectedKategori->name }}</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Paslon</th>
                    <th>Jumlah Votes</th>
                    <th>Persentase</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($selectedKategori->paslons as $paslon)
                    <tr>
                        <td>{{ $paslon->name }}</td>
                        <td>{{ $paslon->votes_count }}</td>
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
    @else
        <p>Tidak ada data untuk kategori yang dipilih.</p>
    @endif
</body>

</html>
