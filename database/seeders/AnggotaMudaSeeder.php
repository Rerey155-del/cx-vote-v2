<?php

namespace Database\Seeders;

use App\Models\AnggotaMuda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggotaMudaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $anggotaMudas = [
            ['no_bp' => '21101152630296', 'name' => 'AKBAR RAMADHAN'],
            ['no_bp' => '22101152610012', 'name' => 'FADHILAH PUTRI'],
            ['no_bp' => '22101152610025', 'name' => 'MUHAMMAD RIFQI'],
            ['no_bp' => '23101152610008', 'name' => 'DINA LESTARI'],
            ['no_bp' => '23101152610019', 'name' => 'RAYHAN PRATAMA'],
        ];

        foreach ($anggotaMudas as $muda) {
            AnggotaMuda::create([
                'no_bp' => $muda['no_bp'],
                'name' => $muda['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
