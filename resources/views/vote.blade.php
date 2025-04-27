<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<x-app-layout>
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

        <div class="grid grid-cols-2 px-20 gap-6 items-center" >
            {{-- foreach data kandidat --}}
            @foreach ($candidates as $candidate)
                <div class="flex justify-center"
                {{-- data-aos="fade-up" --}}
                >
                    <div
                    {{-- data-aos="fade-up" --}}
                        class="shadow-xl border px-8 pt-8 pb-12 w-fit rounded-3xl text-center flex flex-col justify-center items-center">
                        <div class="w-80 h-80">
                            <img src="{{ url('storage/' . $candidate->image) }}" alt="Kandidat"
                                class="w-full h-full rounded-2xl object-cover flex items-center justify-center">
                        </div>

                        <h4 class="text-xl font-semibold mt-8">
                            {{ strtok($candidate->ketua_name, ' ') }} - {{ strtok($candidate->wakil_name, ' ') }}
                        </h4>
                        <p class="mt-2 mb-8">Candidate {{ $candidate->nomor_urut }}</p>

                        <div class="flex-col justify-center">
                            <x-modal-button class="flex justify-center items-center w-fit"
                                data-modal-target="modal-{{ $candidate->id }}"
                                data-modal-toggle="modal-{{ $candidate->id }}">
                                <span class="mr-2">Lihat detail</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                </svg>
                            </x-modal-button>
                        </div>

                        {{-- Modal Detail --}}
                        <div id="modal-{{ $candidate->id }}"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div
                                class="bg-white rounded-3xl shadow-lg max-w-3xl w-full p-10 relative transform transition-all">
                                <button data-modal-hide="modal-{{ $candidate->id }}"
                                    class="absolute top-3 right-3 text-gray-700 hover:text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </button>

                                <div class="flex flex-col md:flex-row space-x-4">
                                    <div class="w-full md:w-1/2">
                                        <img id="main-image-{{ $candidate->id }}"
                                            src="{{ url('storage/' . $candidate->image) }}" alt="Kandidat"
                                            class="rounded-xl shadow-md w-full object-cover">
                                    </div>

                                    <div class="w-full md:w-1/2 p-5 rounded-xl shadow-xl">
                                        <h3 class="text-lg font-semibold text-gray-900">
                                            {{ $candidate->nomor_urut }}. {{ strtok($candidate->ketua_name, ' ') }} -
                                            {{ strtok($candidate->wakil_name, ' ') }}
                                        </h3>

                                        <div class="text-left mt-2">
                                            <h4 class="font-semibold mb-1">Visi:</h4>
                                            <p class="text-sm">{{ $candidate->visi }}</p>
                                        </div>

                                        <div class="mt-2">
                                            <h4 class="font-semibold text-left">Misi:</h4>
                                            <ul class="list-decimal pl-5 text-sm text-left">
                                                @foreach (explode(';', $candidate->misi) as $misi)
                                                    <li>{{ $misi }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                {{-- Tombol Pilih --}}
                                <div class="flex justify-center mt-6">
                                    <x-modal-button data-modal-target="option-{{ $candidate->id }}"
                                        data-modal-toggle="option-{{ $candidate->id }}"
                                        class="px-6 py-2 font-semibold">
                                        Pilih
                                    </x-modal-button>
                                </div>

                                {{-- Modal Konfirmasi --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div id="option-{{ $candidate->id }}"
                    {{-- data-aos="fade-up" --}}
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="bg-white rounded-3xl shadow-lg max-w-md w-full p-10 relative transform transition-all">
                        <button data-modal-hide="option-{{ $candidate->id }}"
                            class="absolute top-3 right-3 text-gray-700 hover:text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>

                        <div class="text-center">
                            <h4 class="text-lg font-bold mb-6">Apakah Anda Yakin Ingin Memilih Kandidat
                                Ini?</h4>
                            <div class="flex justify-center space-x-4">
                                <x-danger-button data-modal-hide="option-{{ $candidate->id }}" class="rounded-3xl">
                                    {{ __('Batal') }}
                                </x-danger-button>

                                <form action="{{ route('vote-store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                    <x-primary-button class="rounded-3xl bg-blue-500">
                                        {{ __('Yakin') }}
                                    </x-primary-button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
<script>
    AOS.init();
</script>
