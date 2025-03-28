<x-guest-layout>

    <h1 class="text-center font-bold text-2xl mb-5">FORMULIR ABSEN</h1>

    <p class="text-base">Selamat datang di Musyawarah Besar XIV UKM-IT Cybernetix</p>

    <form method="POST" action="">
        @csrf

        <!-- Lembaga -->
        <div>
            <x-input-label for="lembaga" :value="__('Lembaga')" class="mt-8"/>
            <x-text-input id="lembaga" class="block mt-1 w-full" type="text" name="lembaga" :value="old('lembaga')" required autofocus autocomplete="lembaga" />

            <x-input-error :messages="$errors->get('lembaga')" class="mt-2" />
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
