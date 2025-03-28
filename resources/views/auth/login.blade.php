<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1 class="text-xl text-center font-bold mb-4">REGISTRASI</h1>

    <p class="text-center mb-5">Daftarkan dirimu agar dapat menggunakan hak suara</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        {{-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> --}}

        {{-- Name --}}
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full mb-5" type="text" name="name" :value="old('name')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative mt-1">
                <x-text-input
                    id="password"
                    class="w-full pr-10"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />

                <button
                    type="button"
                    onclick="togglePassword()"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700"
                >
                    <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.9 12A3.9 3.9 0 1112 8.1a3.9 3.9 0 013.9 3.9zM21 12s-3.5-7-9-7-9 7-9 7 3.5 7 9 7 9-7 9-7z"/>
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <!-- Remember Me -->
        {{-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <div class="flex items-center justify-end mt-4">
            {{-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif --}}

            <x-primary-button class="">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eye-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15.9a3.9 3.9 0 110-7.8 3.9 3.9 0 010 7.8zM21 12s-3.5-7-9-7-9 7-9 7 3.5 7 9 7 9-7 9-7z"/>`; // Mata terbuka
            } else {
                passwordInput.type = "password";
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.9 12A3.9 3.9 0 1112 8.1a3.9 3.9 0 013.9 3.9zM21 12s-3.5-7-9-7-9 7-9 7 3.5 7 9 7 9-7 9-7z"/>`; // Mata tertutup
            }
        }
    </script>
</x-guest-layout>
