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
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
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

    @foreach($kategoris as $kategori)
        <h2>Kategori: {{ $kategori->name }}</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Paslon</th>
                    <th>Jumlah Votes</th>
                    <th>Percentage</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategori->paslons as $paslon)
                    <tr>
                        <td>{{ $paslon->name }}</td>
                        <td>{{ $paslon->votes_count }}</td>
                        @php
                            $totalVotes = $kategori->paslons->sum('votes_count');
                        @endphp
                        <td>
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
    @endforeach
</body>
</html>
