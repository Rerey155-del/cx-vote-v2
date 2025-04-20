<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('candidats')->insert([
            [
                'ketua_name' => 'Akmal Hidayat',
                'wakil_name' => 'Roihan Tauhid',
                'nomor_urut' => '01',
                'visi' => 'menggacorkan ukm',
                'misi' => 'maju tak gentar',
                'image' => null,
                'created_at' => Carbon::parse('2025-04-20 12:31:50'),
                'updated_at' => Carbon::parse('2025-04-20 12:31:50'),
            ],
            [
                'ketua_name' => 'Wafi Gaul',
                'wakil_name' => 'Ahmad dhani',
                'nomor_urut' => '02',
                'visi' => 'memantapkan ukm',
                'misi' => 'gaulkan ukm',
                'image' => '1745152903_.jpeg',
                'created_at' => Carbon::parse('2025-04-20 12:41:43'),
                'updated_at' => Carbon::parse('2025-04-20 12:41:43'),
            ],
        ]);
    }
}
