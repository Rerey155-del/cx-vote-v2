<x-guest-layout>

    <h1 class="text-center font-bold text-2xl mb-5">FORMULIR ABSEN</h1>

    <p class="text-base">Selamat datang di Musyawarah Besar XIV UKM-IT Cybernetix</p>

    <form method="POST" action="">
        @csrf

        <!-- Lembaga -->
        <div class="relative">
            <x-input-label for="lembaga" :value="__('Lembaga')" class="mt-8" />
            <x-select-input name="lembaga" :options="[
                'DPM' => [
                    'DPMU' => 'DPMU',
                    'DPM FILKOM' => 'DPM FILKOM',
                    'DPM FEB' => 'DPM FEB',
                    'DPM FKIP' => 'DPM FKIP',
                    'DPMF DKV' => 'DPMF DKV',
                    'DPMF Psikologi' => 'DPMF Psikologi',
                    'DPMF Teknik' => 'DPMF Teknik',
                ],
                'BEM' => [
                    'BEMU' => 'BEMU',
                    'BEM FILKOM' => 'BEM FILKOM',
                    'BEM FEB' => 'BEM FEB',
                    'BEM FKIP' => 'BEM FKIP',
                    'BEMF DKV' => 'BEMF DKV',
                    'BEMF Psikologi' => 'BEMF Psikologi',
                    'BEMF Teknik' => 'BEMF Teknik',
                ],
                'HMJ' => [
                    'HMJ SI' => 'HMJ SI',
                    'HMJ SK' => 'HMJ SK',
                    'HMJ IF' => 'HMJ IF',
                    'HMJ MI' => 'HMJ MI',
                    'HMJ Akuntansi' => 'HMJ Akuntansi',
                    'HMJ Manajemen' => 'HMJ Manajemen',
                    'HMJ BK' => 'HMJ BK',
                    'HMJ PBI' => 'HMJ PBI',
                    'HMJ PTI' => 'HMJ PTI',
                    'HMTI' => 'HMTI',
                    'HMTS' => 'HMTS',
                ],
                'UKM' => [
                    'UKM Olahraga Adrenaline' => 'UKM Olahraga Adrenaline',
                    'UKM Kesenian Xpressi' => 'UKM Kesenian Xpressi',
                    'UKM Kerohanian Al-Furqon' => 'UKM Kerohanian Al-Furqon',
                    'UKM KSR PMI' => 'UKM KSR PMI',
                    'UKM BA Flash' => 'UKM BA Flash',
                    'UKM-IT Cybernetix' => 'UKM-IT Cybernetix',
                    'UKM WK Soskem' => 'UKM WK Soskem',
                    'UKM Pers Gelegar' => 'UKM Pers Gelegar',
                    'UKK Bela Diri' => 'UKK Bela Diri',
                    'UKM MAPALA' => 'UKM MAPALA',
                ],
            ]" class="mt-1" required autofocus />
            <x-input-error :messages="$errors->get('kode_cx')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama')" class="mt-6" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-12 text-center">
            <x-primary-button class="text-center rounde">
                {{ __('ENTER') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
