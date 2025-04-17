<x-guest-layout>

    <h1 class="text-center font-bold text-2xl mb-5">FORMULIR ABSEN</h1>

    <p class="text-base">Selamat datang di Musyawarah Besar XIV UKM-IT Cybernetix</p>

    <form method="POST" action="{{route('absensi.anggota-luar-biasa')}}">
        @csrf

        <!-- Kode CX -->
        <div>
            <x-input-label for="angkatan" :value="__('Angkatan')" class="mt-8"/>
            <x-text-input id="angkatan" class="block mt-1 w-full" type="number" name="angkatan" :value="old('angkatan')" required autofocus autocomplete="angkatan" />
            <x-input-error :messages="$errors->get('angkatan')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" class="mt-6"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-12">
            <x-primary-button class="text-center rounded-lg">
                {{ __('ENTER') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
