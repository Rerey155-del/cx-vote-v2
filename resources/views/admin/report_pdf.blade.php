<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Report PDF</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2 align="center">Anggota Aktif</h2>
    <table>
        <thead>
            <tr>
                <th>Kode CX</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Absen Pagi</th>
                <th>Absen Siang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->kode_cx }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->created_at ?? '-' }}</td>
                <td>{{ $user->absen_pagi ? \Carbon\Carbon::parse($user->absen_pagi)->format('H:i') : '-' }}</td>
                <td>{{ $user->absen_siang ? \Carbon\Carbon::parse($user->absen_siang)->format('H:i') : '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2 align="center">Anggota Muda</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Absen Pagi</th>
                <th>Absen Siang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota_mudas as $anggota_muda)
            <tr>
                <td>{{ $anggota_muda->name }}</td>
                <td>{{ $anggota_muda->tanggal }}</td>
                <td>{{ $anggota_muda->absen_pagi ? \Carbon\Carbon::parse($anggota_muda->absen_pagi)->format('H:i') : '-' }}</td>
                <td>{{ $anggota_muda->absen_siang ? \Carbon\Carbon::parse($anggota_muda->absen_siang)->format('H:i') : '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <h2 align="center">Lembaga Lainnya</h2>
    <table>
        <thead>
            <tr>
                <th>Lembaga</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Absen Pagi</th>
                <th>Absen Siang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lembaga_lainnyas as $lembaga_lainnya)
            <tr>
                <td>{{ $lembaga_lainnya->lembaga }}</td>
                <td>{{ $lembaga_lainnya->name }}</td>
                <td>{{ $lembaga_lainnya->tanggal }}</td>
                <td>{{ $lembaga_lainnya->absen_pagi ? \Carbon\Carbon::parse($lembaga_lain->absen_pagi)->format('H:i') : '-' }}</td>
                <td>{{ $lembaga_lainnya->absen_siang ? \Carbon\Carbon::parse($lembaga_lain->absen_siang)->format('H:i') : '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
