<x-admin-layout title="Update Candidate">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <div class="px-12">
        <form action="{{ route('dashboard-candidate-update', $candidate->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="my-6">
                <x-input-label for="ketua_name" :value="__('Nama Calon Ketua Umum')" />
                <x-text-input id="ketua_name" class="block mt-1 w-full" type="text" name="ketua_name" :value="old('ketua_name', $candidate->ketua_name)"
                    required autofocus autocomplete="ketua_name" />
                <x-input-error :messages="$errors->get('ketua_name')" class="mt-2" />
            </div>

            <div class="my-6">
                <x-input-label for="wakil_name" :value="__('Nama Calon Wakil Ketua Umum')" />
                <x-text-input id="wakil_name" class="block mt-1 w-full" type="text" name="wakil_name" :value="old('wakil_name', $candidate->wakil_name)"
                    required autocomplete="wakil_name" />
                <x-input-error :messages="$errors->get('wakil_name')" class="mt-2" />
            </div>

            <div class="my-6">
                <x-input-label for="visi" :value="__('Visi')" />
                <x-text-input id="visi" class="block mt-1 w-full" type="text" name="visi" :value="old('visi', $candidate->visi)"
                    required autocomplete="visi" />
                <x-input-error :messages="$errors->get('visi')" class="mt-2" />
            </div>

            <!-- Misi pakai Quill -->
            <div class="my-6">
                <x-input-label for="misi" :value="__('Misi')" />
                <!-- Hidden input buat kirim data -->
                <input type="hidden" name="misi" id="misi" value="{{ old('misi') }}">
                <!-- Quill editor -->
                <div id="editor" class="bg-white rounded-md border-gray-300 p-4 min-h-[150px]"></div>
                <x-input-error :messages="$errors->get('misi')" class="mt-2" />
            </div>

            <div class="flex">
                <!-- Input Nomor Urut -->
                <div class="my-6 mr-6">
                    <x-input-label for="nomor_urut" :value="__('Nomor Urut')" />
                    <x-text-input id="nomor_urut" class="block mt-1 w-full" type="number" name="nomor_urut" :value="old('nomor_urut', $candidate->nomor_urut)" required autocomplete="nomor_urut" />
                    <x-input-error :messages="$errors->get('nomor_urut')" class="mt-2" />
                </div>

                <!-- Input Foto -->
                <div class="my-6">
                    <x-input-label for="image" :value="__('Foto Pasangan Calon')" />
                    <div class="bg-white border rounded-xl shadow p-4 w-[300px]">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 flex items-center justify-center bg-gray-100 rounded overflow-hidden">
                                <img id="preview-image" src="{{ $candidate->image ? asset('storage/' . $candidate->image) : 'https://www.svgrepo.com/show/508699/picture.svg' }}" alt="Preview" class="w-16 h-16 object-cover" />
                            </div>
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
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center mt-10 text-center">
                <x-primary-button class="text-center rounded-lg">
                    {{ __('UPDATE') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('foto').addEventListener('change', function (e) {
            const file = e.target.files[0];
            const preview = document.getElementById('preview-image');

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>
</x-admin-layout>
