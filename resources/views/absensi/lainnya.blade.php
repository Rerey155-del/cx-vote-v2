<x-guest-layout>

    <h1 class="text-center font-bold text-2xl mb-5">FORMULIR ABSEN</h1>

    <p class="text-base">Selamat datang di Musyawarah Besar XIV UKM-IT Cybernetix</p>

    <form method="POST" action="">
        @csrf

        <!-- Kode CX -->
        <div>
            <x-input-label for="kode_cx" :value="__('Kode CX')" class="mt-8"/>
            <x-text-input id="kode_cx" class="block mt-1 w-full" type="text" name="kode_cx" :value="old('kode_cx')" required autofocus autocomplete="kode_cx" />
            <x-input-error :messages="$errors->get('kode_cx')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" class="mt-6"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-12 text-center">
            <x-primary-button class="text-center rounde">
                {{ __('ENTER') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
