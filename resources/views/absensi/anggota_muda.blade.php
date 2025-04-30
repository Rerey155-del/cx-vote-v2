<x-guest-layout :title="$title">

    <h1 class="text-center font-bold text-2xl mb-5">FORMULIR ABSEN</h1>

    <p class="text-base">Selamat datang di Musyawarah Besar XIV UKM-IT Cybernetix</p>

    <form method="POST" action="{{route('absensi.store-anggota-muda')}}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" class="mt-8"/>
            <x-text-input id="name" placeholder="Akbar Ramadhan" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-12">
            <x-primary-button class="text-center rounded-lg">
                {{ __('ENTER') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
