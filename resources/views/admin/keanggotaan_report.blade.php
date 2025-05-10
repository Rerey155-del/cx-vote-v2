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
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota_aktifs as $anggota_aktif)
            <tr>
                <td>{{ $anggota_aktif->kode_cx }}</td>
                <td>{{ $anggota_aktif->name }}</td>
                <td>{{ $anggota_aktif->password }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
