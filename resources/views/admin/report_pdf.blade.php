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
            @foreach ($anggota_aktifs as $anggota_aktif)
            <tr>
                <td>{{ $anggota_aktif->user->kode_cx }}</td>
                <td>{{ $anggota_aktif->user->name }}</td>
                <td>{{ $anggota_aktif->tanggal ?? '-' }}</td>
                <td>{{ $anggota_aktif->absen_pagi ? \Carbon\Carbon::parse($anggota_aktif->absen_pagi)->format('H:i') : '-' }}</td>
                <td>{{ $anggota_aktif->absen_siang ? \Carbon\Carbon::parse($anggota_aktif->absen_siang)->format('H:i') : '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2 align="center">Anggota Luar Biasa</h2>
    <table>
        <thead>
            <tr>
                <th>Angkatan</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Absen Pagi</th>
                <th>Absen Siang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albs as $alb)
            <tr>
                <td>{{ $alb->angkatan }}</td>
                <td>{{ $alb->name }}</td>
                <td>{{ $alb->tanggal }}</td>
                <td>{{ $alb->absen_pagi ? \Carbon\Carbon::parse($alb->absen_pagi)->format('H:i') : '-' }}</td>
                <td>{{ $alb->absen_siang ? \Carbon\Carbon::parse($alb->absen_siang)->format('H:i') : '-' }}</td>
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
                <td>{{ $lembaga_lainnya->absen_pagi ? \Carbon\Carbon::parse($lembaga_lainnya->absen_pagi)->format('H:i') : '-' }}</td>
                <td>{{ $lembaga_lainnya->absen_siang ? \Carbon\Carbon::parse($lembaga_lainnya->absen_siang)->format('H:i') : '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
