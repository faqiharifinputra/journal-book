<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Jurnal Kegiatan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #eee; }
        h3 { text-align: center; margin: 0; padding: 0; }
    </style>
</head>
<body>
    <h3>LAPORAN JURNAL KEGIATAN</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Kegiatan</th>
                <th>Paraf Pembimbing</th>
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
                <td style="text-align:center;">____________________</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
