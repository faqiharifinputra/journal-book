<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Jurnal</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h3 class="text-center">Laporan Jurnal Kegiatan</h3>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Kegiatan</th>
                <th>Paraf</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jurnals as $i => $jurnal)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $jurnal->tempat }}</td>
                <td>{{ $jurnal->tanggal }}</td>
                <td>{{ $jurnal->mulai_pukul }}</td>
                <td>{{ $jurnal->selesai_pukul }}</td>
                <td>{{ $jurnal->kegiatan }}</td>
                <td>__________________</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button class="btn btn-secondary no-print mt-3" onclick="window.print()">🖨️ Cetak Halaman Ini</button>
</div>
</body>
</html>
