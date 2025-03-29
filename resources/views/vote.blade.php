<x-app-layout>
    <div class="bg-orange-400 text-white text-center py-48 flex flex-col items-center">
        <h1 class="text-8xl font-extrabold mb-12">E-Voting</h1>
        <h2 class="text-3xl font-lights">UKM-IT CYBERNETIX</h2>

        <div class="mt-16 w-fit">
            <a href="#marquee" class="rounded-3xl border border-white px-6 py-3 hover:bg-orange-500 transition delay-75">
                {{ __('Mulai') }}
            </a>
        </div>
    </div>

    <div id="marquee" class="bg-blue-600 flex justify-center py-4">
        <marquee behavior="" direction="" scrollamount="20" class="text-white text-3xl font-bold">
            Menggunakan hak suara dengan bijak merupakan sebuah tanggung jawab yang harus dipahami oleh setiap individu
            dalam sebuah organisasi yang demokratis.
        </marquee>
    </div>

    <div class="text-center pt-10 w-full mb-32 bg-white">
        <h3 class="text-xl font-bold mb-4">Pilih Kandidatmu!</h3>

        <p class="mb-10">Suaramu hanya bisa digunakan sekali, jadi gunakanlah dengan bijak</p>

        <div class="flex justify-around px-20">
            <div class="flex justify-center">
                <div
                    class="shadow-xl border px-8 pt-8 pb-12 w-fit rounded-3xl text-center flex flex-col justify-center items-center">
                    <div class="w-80 h-80">
                        <img src="{{ asset('img/Jimmy.jpg') }}" alt="Kandidat"
                            class="w-full h-full rounded-2xl object-cover flex items-center justify-center">
                    </div>

                    <h4 class="text-xl font-semibold my-8">Kandidat 1 - Kandidat 2</h4>

                    <!-- Modal toggle -->
                    <div class=" flex-col justify-center">
                        <x-modal-button onclick="openModal()" class="flex justify-center items-center w-fit">
                            <span class=" mr-2">Lihat detail</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                            </svg>
                        </x-modal-button>
                    </div>

                    <div id="popup-modal"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 opacity-0 scale-90 invisible transition-all duration-300">

                        <!-- Modal Box -->
                        <div
                            class="bg-white rounded-3xl shadow-lg max-w-3xl w-full p-6 relative transform transition-all">

                            <!-- Tombol Close -->
                            <button onclick="closeModal()"
                                class="absolute top-3 right-3 text-gray-700 hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </button>

                            <!-- Konten Modal -->
                            <div class="flex flex-col md:flex-row space-x-4">

                                <!-- Gambar Utama -->
                                <div class="w-full md:w-1/2">
                                    <img src="{{ asset('img/Jimmy.jpg') }}" alt="Kandidat"
                                        class="rounded-xl shadow-md w-full object-cover">
                                </div>

                                <!-- Detail Kandidat -->
                                <div class="w-full md:w-1/2 bg-gray-100 p-5 rounded-xl shadow-md">
                                    <h3 class="text-lg font-semibold text-gray-900">01. Lorem - Ipsum</h3>

                                    <div class="text-left mt-2">
                                        <h4 class="font-semibold text-gray-700">Visi:</h4>
                                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur. Nisi
                                            lectus est commodo dolor.</p>
                                    </div>

                                    <div class="mt-2">
                                        <h4 class="font-semibold text-gray-700">Misi:</h4>
                                        <ul class="list-decimal pl-5 text-sm text-gray-600">
                                            <li>Lorem ipsum dolor sit amet consectetur.</li>
                                            <li>Eros feugiat semper lacus quis nam risus vitae.</li>
                                            <li>Est tortor odio tempus sem ac mattis.</li>
                                            <li>Penatibus vulputate commodo cursus.</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Thumbnail -->
                                <div class="flex flex-col justify-center space-y-2">
                                    <div class="w-24 h-24 overflow-hidden">
                                        <img src="{{ asset('img/Jimmy.jpg') }}" alt="Thumb1"
                                            class="w-full h-full rounded-lg shadow-md cursor-pointer border-2 border-gray-300 object-cover">
                                    </div>

                                    <div class="w-24 h-24 overflow-hidden">
                                        <img src="{{ asset('img/Jimmy.jpg') }}" alt="Thumb2"
                                            class="w-full h-full rounded-lg shadow-md cursor-pointer border-2 border-gray-300 object-cover">
                                    </div>
                                </div>

                            </div>

                            <!-- Tombol Pilih -->
                            <div class="flex justify-center mt-6">
                                <button
                                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-full shadow-md hover:bg-blue-700">
                                    Pilih
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <div
                    class="shadow-xl border px-8 pt-8 pb-12 w-fit rounded-3xl text-center flex flex-col justify-center items-center">
                    <div class="w-80 h-80">
                        <img src="{{ asset('img/Jimmy.jpg') }}" alt="Kandidat"
                            class="w-full h-full rounded-2xl object-cover flex items-center justify-center">
                    </div>

                    <h4 class="text-xl font-semibold my-8">Kandidat 1 - Kandidat 2</h4>

                    <!-- Modal toggle -->
                    <div class=" flex-col justify-center">
                        <x-modal-button onclick="openModal()" class="flex justify-center items-center w-fit">
                            <span class=" mr-2">Lihat detail</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                            </svg>
                        </x-modal-button>
                    </div>

                    <div id="popup-modal"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 opacity-0 scale-90 invisible transition-all duration-300">

                        <div
                            class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative transform transition-all">
                            <button onclick="closeModal()" class="absolute top-3 right-3 hover:text-red-600">
                                ✖
                            </button>
                            <h3 class="text-lg font-semibold text-gray-700">Are you sure?</h3>
                            <p class="text-gray-500">Do you want to proceed with this action?</p>
                            <div class="flex justify-end space-x-3 mt-4">
                                <button class="px-4 py-2 bg-red-600 text-white rounded-lg">
                                    Yes
                                </button>
                                <button onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded-lg">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            const modal = document.getElementById('popup-modal');
            modal.classList.remove('opacity-0', 'scale-90', 'invisible');
            modal.classList.add('opacity-100', 'scale-100', 'visible');
        }

        function closeModal() {
            const modal = document.getElementById('popup-modal');
            modal.classList.remove('opacity-100', 'scale-100', 'visible');
            modal.classList.add('opacity-0', 'scale-90', 'invisible');
        }
    </script>
</x-app-layout>
