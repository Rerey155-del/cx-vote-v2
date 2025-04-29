<x-admin-layout title="Dashboard">
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-green-400 rounded-xl flex justify-center items-center py-12">
            <div class="text-center text-white font-semibold text-xl">
            <h2 class="mb-4">Hak Suara</h2>
            <span>{{$hak_suaras->count()}}</span>
            </div>
        </div>

        <div class="bg-red-400 rounded-xl flex justify-center items-center py-12">
            <div class="text-center text-white font-semibold text-xl">
            <h2 class="mb-4">Belum Coblos</h2>
            <span>{{$belum_cobloses->count()}}</span>
            </div>
        </div>

        <div class="bg-orange-400 rounded-xl flex justify-center items-center py-12">
            <div class="text-center text-white font-semibold text-xl">
            <h2 class="mb-4">Sudah Coblos</h2>
            <span>{{$pencoblosans->count()}}</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-5 gap-4 mt-4">
        <div class="bg-orange-400 rounded-xl flex justify-center items-center py-12">
            <div class="text-center text-white font-semibold text-lg">
            <h2 class="mb-4">Anggota Aktif</h2>
            <span>{{$hak_suaras->count()}}</span>
            </div>
        </div>

        <div class="bg-cyan-400 rounded-xl flex justify-center items-center py-12">
            <div class="text-center text-white font-semibold text-lg">
            <h2 class="mb-4">Anggota Muda</h2>
            <span>{{$anggota_mudas}}</span>
            </div>
        </div>

        <div class="bg-violet-700 rounded-xl flex justify-center items-center py-12">
            <div class="text-center text-white font-semibold text-lg">
            <h2 class="mb-4">Anggota Luar Biasa</h2>
            <span>{{$anggota_luar_biasas}}</span>
            </div>
        </div>

        <div class="bg-yellow-400 rounded-xl flex justify-center items-center py-12">
            <div class="text-center text-white font-semibold text-lg">
            <h2 class="mb-4">Lembaga Lainnya</h2>
            <span>{{$lembaga_lainnyas}}</span>
            </div>
        </div>

        <div class="bg-purple-400 rounded-xl flex justify-center items-center py-12">
            <div class="text-center text-white font-semibold text-lg">
            <h2 class="mb-4">Total Hadir</h2>
            <span>{{$total_attendances}}</span>
            </div>
        </div>
    </div>
</x-admin-layout>
