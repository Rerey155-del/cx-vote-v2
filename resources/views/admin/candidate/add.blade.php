<x-admin-layout title="Add Candidate">
    <div class="px-12">
        <form action="">
            <div class="my-6">
                <x-input-label for="name" :value="__('Nama Calon Ketua Umum')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="my-6">
                <x-input-label for="name" :value="__('Nama Calon Ketua Umum')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="my-6">
                <x-input-label for="name" :value="__('Nama Calon Ketua Umum')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="my-6">
                <x-input-label for="name" :value="__('Nama Calon Ketua Umum')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="flex items-center">
                <div class="my-6 mr-6">
                    <x-input-label for="name" :value="__('Nama Calon Ketua Umum')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="">
                    <x-input-label for="name" :value="__('Nama Calon Ketua Umum')" />
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
