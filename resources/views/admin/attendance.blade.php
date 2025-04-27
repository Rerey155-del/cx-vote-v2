<x-admin-layout title="Kehadiran">
    <div class=" mx-auto bg-white p-6 rounded-lg shadow-md">
        <!-- Tabs -->
        <div class="flex space-x-4 border-b mb-6">
            <button class="tab-button text-blue-600 border-b-2 border-blue-600 pb-2"
                onclick="openTab(event, 'aktif')">Anggota Aktif</button>
            <button class="tab-button text-gray-600 hover:text-blue-600 pb-2"
                onclick="openTab(event, 'luar_biasa')">Anggota Luar Biasa</button>
            <button class="tab-button text-gray-600 hover:text-blue-600 pb-2" onclick="openTab(event, 'muda')">Anggota
                Muda</button>
            <button class="tab-button text-gray-600 hover:text-blue-600 pb-2" onclick="openTab(event, 'lembaga')">Lembaga
                Lain</button>
        </div>

        <!-- Tab Contents -->
        <div id="aktif" class="tab-content">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Kode CX</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border text-center">Sudah Memilih</th>
                            <th class="px-4 py-2 border">tanggal</th>
                            <th class="px-4 py-2 border">Absen Pagi</th>
                            <th class="px-4 py-2 border">Absen Siang</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($anggota_aktifs as $anggota_aktif)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $anggota_aktif->user->kode_cx }}</td>
                                <td class="px-4 py-2 border">{{ $anggota_aktif->user->name }}</td>
                                @if ($anggota_aktif->user->pencoblosan)
                                    <td class="px-4 py-2 border text-center text-green-600 text-xl">✔</td>
                                @else
                                    <td class="px-4 py-2 border text-center text-red-600 text-xl">X</td>
                                @endif
                                <td class="px-4 py-2 border">
                                    {{ $anggota_aktif->tanggal ? $anggota_aktif->tanggal : 'Belum absen' }}</td>
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
            </div>
        </div>

        <div id="luar_biasa" class="tab-content hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Angkatan</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">tanggal</th>
                            <th class="px-4 py-2 border">Absen Pagi</th>
                            <th class="px-4 py-2 border">Absen Siang</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($albs as $alb)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $alb->angkatan }}</td>
                                <td class="px-4 py-2 border">{{ $alb->name }}</td>
                                <td class="px-4 py-2 border">{{ $alb->tanggal }}</td>
                                <td class="px-4 py-2 border text-center">
                                    @if ($alb->absen_pagi !== null)
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
            </div>
        </div>

        <div id="muda" class="tab-content hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">tanggal</th>
                            <th class="px-4 py-2 border">Absen Pagi</th>
                            <th class="px-4 py-2 border">Absen Siang</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
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
            </div>
        </div>

        <div id="lembaga" class="tab-content hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Lembaga</th>
                            <th class="px-4 py-2 border">tanggal</th>
                            <th class="px-4 py-2 border">Absen Pagi</th>
                            <th class="px-4 py-2 border">Absen Siang</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($lembaga_lainnyas as $lembaga_lainnya)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $lembaga_lainnya->name }}</td>
                                <td class="px-4 py-2 border">{{ $lembaga_lainnya->lembaga }}</td>
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

    <!-- Script untuk Tab -->
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tabbuttons;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.add("hidden");
            }
            tabbuttons = document.getElementsByClassName("tab-button");
            for (i = 0; i < tabbuttons.length; i++) {
                tabbuttons[i].classList.remove("text-blue-600", "border-b-2", "border-blue-600");
                tabbuttons[i].classList.add("text-gray-600");
            }
            document.getElementById(tabName).classList.remove("hidden");
            evt.currentTarget.classList.remove("text-gray-600");
            evt.currentTarget.classList.add("text-blue-600", "border-b-2", "border-blue-600");
        }
    </script>

</x-admin-layout>
