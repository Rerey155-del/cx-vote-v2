<div>
    <div class="w-1/4">
        <input type="text" wire:model.debounce.500ms.live="search" placeholder="Cari anggota..."
            class="w-full px-4 py-2 mb-4 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Kode CX</th>
                    <th class="px-4 py-2 border">Nama</th>
                    {{-- <th class="px-4 py-2 border">Password</th> --}}
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse ($hak_suaras as $hak_suara)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $hak_suara->kode_cx }}</td>
                        <td class="px-4 py-2 border">{{ $hak_suara->name }}</td>
                        {{-- <td class="px-4 py-2 border">{{ $hak_suara->password }}</td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center p-3 text-xl">Anggota mising lee</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
