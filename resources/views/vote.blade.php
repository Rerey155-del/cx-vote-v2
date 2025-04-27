<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<x-app-layout>
    @section('css')
        <style>
            ol {
                list-style-type: decimal;
                padding-left: 1.5rem;
            }

            ul {
                list-style-type: disc;
                padding-left: 1.5rem;
            }
        </style>
    @endsection
    <div class="bg-orange-400 text-white text-center pt-[8rem] pb-[7rem] flex flex-col items-center">
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

        <div class="grid grid-cols-2 gap-6 px-20 items-center container mx-auto">

            <!-- Card Kandidat 1 -->
            <div class="flex justify-center">
                <div
                    class="shadow-xl border px-8 pt-8 pb-12 w-fit rounded-3xl text-center flex flex-col justify-center items-center transition-transform duration-500 hover:scale-105">

                    <div class="w-80 h-80">
                        <img src="/path/to/your/image1.jpg" alt="Kandidat 1"
                            class="w-full h-full rounded-2xl object-cover">
                    </div>

                    <h4 class="text-xl font-semibold mt-8">
                        Reyhan - Maulana
                    </h4>
                    <p class="mt-2 mb-8">Candidate 01</p>

                    <div class="flex justify-center">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center">
                            <span class="mr-2">Lihat detail</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Card Kandidat 2 -->
            <div class="flex justify-center">
                <div
                    class="shadow-xl border px-8 pt-8 pb-12 w-fit rounded-3xl text-center flex flex-col justify-center items-center transition-transform duration-500 hover:scale-105">

                    <div class="w-80 h-80">
                        <img src="/path/to/your/image2.jpg" alt="Kandidat 2"
                            class="w-full h-full rounded-2xl object-cover">
                    </div>

                    <h4 class="text-xl font-semibold mt-8">
                        Wafi - Ghjk
                    </h4>
                    <p class="mt-2 mb-8">Candidate 02</p>

                    <div class="flex justify-center">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center">
                            <span class="mr-2">Lihat detail</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

        </div>

    </div>
</x-app-layout>

<script>
    AOS.init();
</script>
