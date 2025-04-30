<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voters</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-admin-layout title="Report">
    <div class="flex flex-col-2 mb-4">
        <a href="javascript:void(0);" onclick="openAndPrintPDF();"
            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <img src="../img/print.svg" alt="" class="me-2">
            Print Report
        </a>


        <a href="{{ route('report.view-pdf') }}" target="_blank"
            class="text-white bg-[rgb(0,226,23)] hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-2 dark:focus:ring-blue-800">
            <img src="../img/view.svg" alt="" class="me-2">
            View Report
        </a>



    </div>
    <div class=" mx-auto bg-white p-6 rounded-xl shadow-md">
        <!-- Tab Contents -->
        <div class="tab-content">
            <div class="overflow-x-auto">
                <h1 class="font-bold mb-2 text-center">Anggota Aktif</h1>
                <table class="min-w-full text-sm text-left border">
                    <thead class="bg-gray-100">
                        <tr>

                            <th class="px-4 py-2 border">Kode CX</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Tanggal</th>
                            <th class="px-4 py-2 border">Absen Pagi</th>
                            <th class="px-4 py-2 border">Absen Siang</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($anggota_aktifs as $anggota_aktif)
                            <tr class="hover:bg-gray-50">

                                <td class="px-4 py-2 border">{{ $anggota_aktif->user->kode_cx }}</td>
                                <td class="px-4 py-2 border">{{ $anggota_aktif->user->name }}</td>
                                <td class="px-4 py-2 border">{{ $anggota_aktif->tanggal }}</td>
                                <td class="px-4 py-2 border text-center">
                                    @if ($anggota_aktif->absen_pagi)
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $anggota_aktif->absen_pagi)->format('H:i') }}
                                    @else
                                        <span class="text-red-600">Belum absen</span>
                                    @endif
                                </td>

                                <td class="px-4 py-2 border text-center">
                                    @if ($anggota_aktif->absen_siang)
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $anggota_aktif->absen_siang)->format('H:i') }}
                                    @else
                                        <span class="text-red-600">Belum absen</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h1 class="font-bold mb-2 mt-8 text-center">Anggota Luar Biasa</h1>
                <table class="min-w-full text-sm text-left border mt-5">
                    <thead class="bg-gray-100">
                        <tr>

                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Tanggal</th>
                            <th class="px-4 py-2 border">Absen Pagi</th>
                            <th class="px-4 py-2 border">Absen Siang</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white mt-4">
                        @foreach ($albs as $alb)
                            <tr class="hover:bg-gray-50">

                                <td class="px-4 py-2 border">{{ $alb->name }}</td>
                                <td class="px-4 py-2 border">{{ $alb->tanggal }}</td>
                                <td class="px-4 py-2 border text-center">
                                    @if ($alb->absen_pagi)
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $alb->absen_pagi)->format('H:i') }}
                                    @else
                                        <span class="text-red-600">Belum absen</span>
                                    @endif
                                </td>

                                <td class="px-4 py-2 border text-center">
                                    @if ($alb->absen_siang)
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $alb->absen_siang)->format('H:i') }}
                                    @else
                                        <span class="text-red-600">Belum absen</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h1 class="font-bold mb-2 mt-8 text-center">Anggota Muda</h1>
                <table class="min-w-full text-sm text-left border mt-5">
                    <thead class="bg-gray-100">
                        <tr>

                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Tanggal</th>
                            <th class="px-4 py-2 border">Absen Pagi</th>
                            <th class="px-4 py-2 border">Absen Siang</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white mt-4">
                        @foreach ($anggota_mudas as $anggota_muda)
                            <tr class="hover:bg-gray-50">

                                <td class="px-4 py-2 border">{{ $anggota_muda->name }}</td>
                                <td class="px-4 py-2 border">{{ $anggota_muda->tanggal }}</td>
                                <td class="px-4 py-2 border text-center">
                                    @if ($anggota_muda->absen_pagi)
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $anggota_muda->absen_pagi)->format('H:i') }}
                                    @else
                                        <span class="text-red-600">Belum absen</span>
                                    @endif
                                </td>

                                <td class="px-4 py-2 border text-center">
                                    @if ($anggota_muda->absen_siang)
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $anggota_muda->absen_siang)->format('H:i') }}
                                    @else
                                        <span class="text-red-600">Belum absen</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h1 class="font-bold mb-2 mt-8 text-center">Lembaga Lainnya</h1>
                <table class="min-w-full text-sm text-left border mt-5">
                    <thead class="bg-gray-100">
                        <tr>

                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Tanggal</th>
                            <th class="px-4 py-2 border">Absen Pagi</th>
                            <th class="px-4 py-2 border">Absen Siang</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white mt-4">
                        @foreach ($lembaga_lainnyas as $lembaga_lainnya)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $lembaga_lainnya->lembaga }}</td>
                                <td class="px-4 py-2 border">{{ $lembaga_lainnya->name }}</td>
                                <td class="px-4 py-2 border">{{ $lembaga_lainnya->tanggal }}</td>
                                <td class="px-4 py-2 border text-center">
                                    @if ($lembaga_lainnya->absen_pagi)
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $lembaga_lainnya->absen_pagi)->format('H:i') }}
                                    @else
                                        <span class="text-red-600">Belum absen</span>
                                    @endif
                                </td>

                                <td class="px-4 py-2 border text-center">
                                    @if ($lembaga_lainnya->absen_siang)
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $lembaga_lainnya->absen_siang)->format('H:i') }}
                                    @else
                                        <span class="text-red-600">Belum absen</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function openAndPrintPDF() {
            const pdfWindow = window.open('{{ route('report.view-pdf') }}', '_blank');
            pdfWindow.onload = function() {
                pdfWindow.focus();
                pdfWindow.print();
            };
        }
    </script>

</x-admin-layout>
