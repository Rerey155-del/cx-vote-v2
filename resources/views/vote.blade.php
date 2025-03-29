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

        <div class="flex justify-center">
            <div class="shadow-xl border px-8 pt-8 pb-12 w-fit rounded-3xl text-center flex justify-center flex-col">
                <div class="w-80 h-80">
                    <img src="{{ asset('img/Jimmy.jpg') }}" alt="Kandidat"
                        class="w-full h-full rounded-2xl object-cover flex items-center justify-center">
                </div>

                <h4 class="text-xl font-semibold my-8">Kandidat 1 - Kandidat 2</h4>

                <!-- Modal toggle -->
                <x-modal-button onclick="openModal()">
                    Toggle Modal
                </x-modal-button>

                <div id="popup-modal"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 opacity-0 scale-90 invisible transition-all duration-300">

                    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-6 relative transform transition-all">
                        <button onclick="closeModal()"
                            class="absolute top-3 right-3 text-gray-400 hover:text-gray-900">
                            ✖
                        </button>
                        <h3 class="text-lg font-semibold text-gray-700">Are you sure?</h3>
                        <p class="text-gray-500">Do you want to proceed with this action?</p>
                        <div class="flex justify-end space-x-3 mt-4">
                            <button
                                class="px-4 py-2 bg-red-600 text-white rounded-lg">
                                Yes
                            </button>
                            <button onclick="closeModal()"
                                class="px-4 py-2 bg-gray-200 rounded-lg">
                                Cancel
                            </button>
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
