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
                    <img src="{{ asset('img/Jimmy.jpg') }}" alt="Kandidat" class="w-full h-full rounded-2xl object-cover flex items-center justify-center">
                </div>

                <h4 class="text-xl font-semibold my-8">Kandidat 1 - Kandidat 2</h4>

                <!-- Modal toggle -->
                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="block mx-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Toggle modal
                </button>
            </div>


        </div>

    </div>
</x-app-layout>
