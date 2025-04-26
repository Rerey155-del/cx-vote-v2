<x-admin-layout title="Voters">

    <div class=" mx-auto bg-white p-6 rounded-xl shadow-md">
        <!-- Tabs -->
        <div class="flex space-x-4 border-b mb-6">
            <button class="tab-button text-blue-600 border-b-2 border-blue-600 pb-2"
                onclick="openTab(event, 'sudah')">Sudah Memilih</button>
            <button class="tab-button text-gray-600 hover:text-blue-600 pb-2" onclick="openTab(event, 'belum')">Belum
                Memilih</button>
        </div>

        <!-- Tab Contents -->
        <div id="sudah" class="tab-content">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Kode CX</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Waktu Coblos</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($pencoblosans as $pencoblosan)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $pencoblosan->user->kode_cx }}</td>
                                <td class="px-4 py-2 border">{{ $pencoblosan->user->name }}</td>
                                <td class="px-4 py-2 border">{{ $pencoblosan->user->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div id="belum" class="tab-content hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Kode CX</th>
                            <th class="px-4 py-2 border">Nama</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($belum_cobloses as $belum_coblos)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $belum_coblos->kode_cx }}</td>
                                <td class="px-4 py-2 border">{{ $belum_coblos->name }}</td>
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
