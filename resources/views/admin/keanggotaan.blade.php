<x-admin-layout title="Keanggotaan">
    <div class=" mx-auto bg-white p-6 rounded-xl shadow-md">
        <!-- Tabs -->
        <div class="flex space-x-4 border-b mb-6">
            <button class="tab-button text-blue-600 border-b-2 border-blue-600 pb-2"
                onclick="openTab(event, 'anggota_aktif')">Anggota Aktif</button>
            <button class="tab-button text-gray-600 hover:text-blue-600 pb-2" onclick="openTab(event, 'anggota_muda')">
                Anggota Muda
            </button>
        </div>

        <!-- Tab Contents -->
        <div id="anggota_aktif" class="tab-content">
            <x-modal-button data-modal-target="tambah-anggota-aktif" data-modal-toggle="tambah-anggota-aktif"
                class="mb-2">
                Tambah Anggota Aktif
            </x-modal-button>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Kode CX</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Password</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($hak_suaras as $hak_suara)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $hak_suara->kode_cx }}</td>
                                <td class="px-4 py-2 border">{{ $hak_suara->name }}</td>
                                <td class="px-4 py-2 border">{{ $hak_suara->password }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div id="anggota_muda" class="tab-content hidden">
            <x-modal-button data-modal-target="tambah-anggota-muda" data-modal-toggle="tambah-anggota-muda"
                class="mb-2">
                Tambah Anggota Muda
            </x-modal-button>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">No Bp</th>
                            <th class="px-4 py-2 border">Nama</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($anggota_mudas as $anggota_muda)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $anggota_muda->no_bp }}</td>
                                <td class="px-4 py-2 border">{{ $anggota_muda->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Main modal anggota aktif -->
    <div id="tambah-anggota-aktif" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Buat Anggota Aktif
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="tambah-anggota-aktif">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal anggota aktif -->
                <form method="POST" action="{{ route('store-anggota-aktif') }}" class="p-4 md:p-5">
                    @csrf
                    <!-- Kode CX -->
                    <div class="mb-4">
                        <x-input-label for="kode_cx" :value="__('Kode CX')" />
                        <x-text-input id="kode_cx" placeholder="000-001" class="block mt-1 w-full" type="text"
                            name="kode_cx" :value="old('kode_cx')" required autofocus autocomplete="kode_cx" />
                        <x-input-error :messages="$errors->get('kode_cx')" class="mt-2" />
                        <p class="text-red-600 mt-2 text-sm">*Gunakan (<span class="font-extrabold text-2xl">-</span>)
                            untuk memisahkan kode angkatan dan kode keanggotaan</p>
                    </div>

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nama')" />
                        <x-text-input id="name" placeholder="Akbar Ramadhan" class="block mt-1 w-full"
                            type="text" name="name" :value="old('name')" required autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <p class="text-red-600 font-bold mt-2">*Mohon inputkan dengan nama lengkap</p>
                    <hr class="mt-4">
                    <div class="mt-6">
                        <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Tambah Anggota
                    </button>
                    <button type="button" data-modal-hide="tambah-anggota-aktif"
                        class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Batal
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Main modal anggota aktif -->
    <div id="tambah-anggota-muda" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Buat Anggota Muda
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="tambah-anggota-muda">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal anggota muda -->
                <form method="POST" action="{{ route('store-anggota-muda') }}" class="p-4 md:p-5">
                    @csrf
                    <!-- No Bp -->
                    <div class="mb-4">
                        <x-input-label for="no_bp" :value="__('No Bp')" />
                        <x-text-input id="no_bp" placeholder="21101152630296" class="block mt-1 w-full" type="text"
                            name="no_bp" :value="old('no_bp')" required autofocus autocomplete="no_bp" />
                        <x-input-error :messages="$errors->get('no_bp')" class="mt-2" />
                    </div>

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Nama')" />
                        <x-text-input id="name" placeholder="Akbar Ramadhan" class="block mt-1 w-full"
                            type="text" name="name" :value="old('name')" required autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <p class="text-red-600 font-bold mt-2">*Mohon inputkan dengan nama lengkap</p>
                    <hr class="mt-4">
                    <div class="mt-6">
                        <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Tambah Anggota
                    </button>
                    <button type="button" data-modal-hide="tambah-anggota-muda"
                        class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Batal
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
