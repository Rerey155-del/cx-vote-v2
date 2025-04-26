<x-admin-layout title="Add Candidate">
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
    <div class="px-12">
        <form action="{{ route('dashboard-candidate-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="my-6">
                <x-input-label for="ketua_name" :value="__('Nama Calon Ketua Umum')" />
                <x-text-input id="ketua_name" class="block mt-1 w-full" type="text" name="ketua_name" :value="old('ketua_name')"
                    required autofocus autocomplete="ketua_name" />
                <x-input-error :messages="$errors->get('ketua_name')" class="mt-2" />
            </div>

            <div class="my-6">
                <x-input-label for="wakil_name" :value="__('Nama Calon Wakil Ketua Umum')" />
                <x-text-input id="wakil_name" class="block mt-1 w-full" type="text" name="wakil_name"
                    :value="old('wakil_name')" required autocomplete="wakil_name" />
                <x-input-error :messages="$errors->get('wakil_name')" class="mt-2" />
            </div>

            <div class="my-6">
                <x-input-label for="visi" :value="__('Visi')" />
                <x-text-input id="visi" class="block mt-1 w-full" type="text" name="visi" :value="old('visi')"
                    required autocomplete="visi" />
                <x-input-error :messages="$errors->get('visi')" class="mt-2" />
            </div>

            <!-- Misi pakai trixeditor -->
            <div class="my-6">
                <div class="form-group">
                    <label for="misi">Misi</label>
                    <input id="misi" type="hidden" name="misi">
                    <trix-editor input="misi"></trix-editor>
                </div>
            </div>

            

            <div class="flex">
                <!-- Input Nomor Urut -->
                <div class="my-6 mr-6">
                    <x-input-label for="nomor_urut" :value="__('Nomor Urut')" />
                    <x-text-input id="nomor_urut" class="block mt-1 w-full" type="number" name="nomor_urut"
                        :value="old('nomor_urut', $candidate->nomor_urut ?? '')" required autocomplete="nomor_urut" />
                    <x-input-error :messages="$errors->get('nomor_urut')" class="mt-2" />
                </div>

                <!-- Input Foto -->
                <div class="my-6">
                    <x-input-label for="foto" :value="__('Foto Pasangan Calon')" />
                    <div class="bg-white border rounded-xl shadow p-4 w-[300px]">
                        <div class="flex items-center space-x-4">
                            <img id="preview-image" class="mt-4 w-32 h-32" />
                            <div>
                                <input type="file" name="image" id="foto" accept="image/*"
                                    class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100" />


                                <p class="text-xs text-gray-500 mt-1">Please upload image size less than 1000KB</p>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center mt-10 text-center">
                <x-primary-button class="text-center rounded-lg">
                    {{ __('KIRIM') }}
                </x-primary-button>
            </div>

        </form>
    </div>

    @section('script')
        <script>
            document.getElementById('foto').addEventListener('change', function(e) {
                const file = e.target.files[0];
                const preview = document.getElementById('preview-image');

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });
        </script>
    @endsection

</x-admin-layout>
