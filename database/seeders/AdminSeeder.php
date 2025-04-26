<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $randomPassword = Str::lower(Str::random(5));
        DB::table('users')->insert([
            [
                'kode_cx' => '000-000',
                'name' => 'admin',
                'password' => $randomPassword,
                'role' => true,
                'created_at' => today(),
                'updated_at' => today()
            ]
        ]);
    }
}
