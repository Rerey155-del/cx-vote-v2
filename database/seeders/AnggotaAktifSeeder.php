<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AnggotaAktifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['kode_cx' => '013-004', 'name' => 'Andhika Mulya'],
            ['kode_cx' => '014-003', 'name' => 'Alif Suryadi'],
            ['kode_cx' => '014-004', 'name' => 'Aldi Musneldi'],
            ['kode_cx' => '014-022', 'name' => 'Muhammad Iqbal'],
            ['kode_cx' => '014-024', 'name' => 'Rizki Mufid'],
            ['kode_cx' => '014-025', 'name' => 'Reza Fahlefi'],
            ['kode_cx' => '014-027', 'name' => 'Afika Syahira'],
            ['kode_cx' => '015-001', 'name' => 'ADIZA JAYA ABRAR'],
            ['kode_cx' => '015-002', 'name' => 'AFEVA RAHMI RAFITRI'],
            ['kode_cx' => '015-003', 'name' => 'AGIL SAPUTRA'],
            ['kode_cx' => '015-004', 'name' => 'AKMAL HIDAYAT'],
            ['kode_cx' => '015-005', 'name' => 'AL HAJJRI PRIMA S'],
            ['kode_cx' => '015-006', 'name' => 'AMELIA KASRIN'],
            ['kode_cx' => '015-007', 'name' => 'ANGGI RISKIANI'],
            ['kode_cx' => '015-008', 'name' => 'ARISY MIRZAL'],
            ['kode_cx' => '015-009', 'name' => 'ARYA FATTAHU H'],
            ['kode_cx' => '015-010', 'name' => 'BENO DWIANTO'],
            ['kode_cx' => '015-011', 'name' => 'BEVINNO HADIGUNA'],
            ['kode_cx' => '015-013', 'name' => 'DELAN FAUZI'],
            ['kode_cx' => '015-014', 'name' => 'DHEA HAFIFAH PUTRI'],
            ['kode_cx' => '015-015', 'name' => 'DINA ISWARA'],
            ['kode_cx' => '015-016', 'name' => 'DIYAH INDAH SARI'],
            ['kode_cx' => '015-017', 'name' => 'FADEL MUHAMMAD'],
            ['kode_cx' => '015-018', 'name' => 'FERDIANSYAH'],
            ['kode_cx' => '015-019', 'name' => 'FHADILA NOVA R'],
            ['kode_cx' => '015-020', 'name' => 'FHAUZIA FITRI'],
            ['kode_cx' => '015-021', 'name' => 'FILSHA RIFI MAHARANI'],
            ['kode_cx' => '015-022', 'name' => 'ICA PUTRI NATASYA'],
            ['kode_cx' => '015-024', 'name' => 'JIMMY WIRA ARBA\'A'],
            ['kode_cx' => '015-025', 'name' => 'JOS BELINO AZRA'],
            ['kode_cx' => '015-026', 'name' => 'KEVIN JONA ALFAREL'],
            ['kode_cx' => '015-027', 'name' => 'KEYFA SALSA AULIA'],
            ['kode_cx' => '015-028', 'name' => 'LIKE SAGITRI HELEN'],
            ['kode_cx' => '015-029', 'name' => 'M TONI FARIH HIDAYAT'],
            ['kode_cx' => '015-030', 'name' => 'MAYLISA PUTRI AMANDA'],
            ['kode_cx' => '015-031', 'name' => 'MEYSILA NOFITRI'],
            ['kode_cx' => '015-032', 'name' => 'MUHAMAD ARIEF D'],
            ['kode_cx' => '015-033', 'name' => 'MUHAMMAD ASYRAF'],
            ['kode_cx' => '015-034', 'name' => 'MYCHER RINSA EFENDI'],
            ['kode_cx' => '015-036', 'name' => 'NURUL AULIA'],
            ['kode_cx' => '015-037', 'name' => 'NURUL YASWINDA PUTRI'],
            ['kode_cx' => '015-038', 'name' => 'RAHMAD HIDAYAT'],
            ['kode_cx' => '015-040', 'name' => 'REYHAN ALFARO'],
            ['kode_cx' => '015-041', 'name' => 'REYHAN MAULANA'],
            ['kode_cx' => '015-042', 'name' => 'ROIHAN TAUHID'],
            ['kode_cx' => '015-043', 'name' => 'SITI NURKHOLIZA'],
            ['kode_cx' => '015-044', 'name' => 'STEVANI YOLANDA'],
            ['kode_cx' => '015-045', 'name' => 'SUWARDI'],
            ['kode_cx' => '015-046', 'name' => 'SYAHRUL FURQON'],
            ['kode_cx' => '015-047', 'name' => 'VENO KURNIA PUTRI'],
            ['kode_cx' => '015-048', 'name' => 'VEVI MARTHA TIKRIS'],
            ['kode_cx' => '015-049', 'name' => 'YAUMA QARNUN'],
            ['kode_cx' => '015-050', 'name' => 'YUNITA BETRIANI'],
        ];

        foreach ($users as $user) {
            $password = Str::lower(Str::random(5)); // 5 karakter huruf kecil dan angka
            DB::table('users')->insert([
                'kode_cx' => $user['kode_cx'],
                'name' => $user['name'],
                'password' => $password,
                'role' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
