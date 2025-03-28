<x-guest-layout>

    <h1 class="text-center font-bold text-2xl mb-5">FORMULIR ABSEN</h1>

    <p class="text-base">Selamat datang di Musyawarah Besar XIV UKM-IT Cybernetix</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Kode CX -->
        <div class="my-8">
            <x-input-label for="kode_cx" :value="__('Kode CX')"/>
            <x-text-input id="kode_cx" class="block mt-1 w-full" type="text" name="kode_cx" :value="old('kode_cx')" required autofocus autocomplete="kode_cx" />
            <x-input-error :messages="$errors->get('kode_cx')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Password -->
        {{-- <div class="mt-4 hidden">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> --}}

        <!-- Confirm Password -->
        {{-- <div class="mt-4 hidden">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div> --}}

        <div class="flex items-center justify-center mt-10 text-center">
            <x-primary-button class="text-center rounde">
                {{ __('ENTER') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
