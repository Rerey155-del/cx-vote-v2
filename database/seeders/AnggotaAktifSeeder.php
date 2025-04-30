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
            ['kode_cx' => '013-004', 'name' => 'ANDHIKA MULYA'],

            ['kode_cx' => '014-003', 'name' => 'ALIF SURYADI'],
            ['kode_cx' => '014-004', 'name' => 'ALDI MUSNELDI'],
            ['kode_cx' => '014-022', 'name' => 'MUHAMMAD IQBAL'],
            ['kode_cx' => '014-024', 'name' => 'RIZKI MUFID'],
            ['kode_cx' => '014-025', 'name' => 'REZA FAHLEFI'],
            ['kode_cx' => '014-027', 'name' => 'AFIKA SYAHIRA'],

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

            ['kode_cx' => '016-001', 'name' => 'ADIT ARDIAN'],
            ['kode_cx' => '016-002', 'name' => 'AFDAL RISKY WAHYUDI'],
            ['kode_cx' => '016-003', 'name' => 'AGUNG KURNIA BEKTI'],
            ['kode_cx' => '016-004', 'name' => 'ALDI SYAPUTRA'],
            ['kode_cx' => '016-005', 'name' => 'ALDO HEFTRIAN ZUHRI'],
            ['kode_cx' => '016-006', 'name' => 'AMELIA SYAF PUTRI'],
            ['kode_cx' => '016-007', 'name' => 'ANDRE YANIS'],
            ['kode_cx' => '016-008', 'name' => 'ANGGEL SAFINDA'],
            ['kode_cx' => '016-009', 'name' => 'ARINDA RAHMA DHANI'],
            ['kode_cx' => '016-010', 'name' => 'DAMAI PUTRI AFIFAH'],
            ['kode_cx' => '016-011', 'name' => 'DINO AL AZIZ'],
            ['kode_cx' => '016-012', 'name' => 'DONES SUPRIADI'],
            ['kode_cx' => '016-013', 'name' => 'FARHAN WIRA AFWAN'],
            ['kode_cx' => '016-014', 'name' => 'HANIF WAHYUDI'],
            ['kode_cx' => '016-015', 'name' => 'HARDI PUTRA RAMADHAN'],
            ['kode_cx' => '016-016', 'name' => 'ILHAM DWI SAPUTRA'],
            ['kode_cx' => '016-017', 'name' => 'ISYAWILLA ARYANTI PUTRI'],
            ['kode_cx' => '016-018', 'name' => 'JEPIN TRIHARMONO'],
            ['kode_cx' => '016-019', 'name' => 'JUMAIDI REZI ALFIKRI'],
            ['kode_cx' => '016-020', 'name' => 'LADIVA OLIVIA'],
            ['kode_cx' => '016-021', 'name' => 'MAHEZA NOVRAYUDA'],
            ['kode_cx' => '016-022', 'name' => 'MUHAMMAD RAFIF PADLI'],
            ['kode_cx' => '016-023', 'name' => 'MUHAMMAD RAHEL PRATAMA'],
            ['kode_cx' => '016-024', 'name' => 'MUHAMMAD RAKASIWI'],
            ['kode_cx' => '016-025', 'name' => 'MUHAMMAD ZIKRI'],
            ['kode_cx' => '016-026', 'name' => 'MUTIARA MULIANI'],
            ['kode_cx' => '016-027', 'name' => 'NAZIRA CHAIRANI FAUZA'],
            ['kode_cx' => '016-028', 'name' => 'RACHMAT HIDAYAT'],
            ['kode_cx' => '016-029', 'name' => 'RAMZY ALKHAIRI RISAP'],
            ['kode_cx' => '016-030', 'name' => 'RHAMADI IKHSAN'],
            ['kode_cx' => '016-031', 'name' => 'ROFIQ NAHDI YULHARI'],
            ['kode_cx' => '016-032', 'name' => 'SALSABILLA'],
            ['kode_cx' => '016-033', 'name' => 'SHEVA HUMAIRA THENU'],
            ['kode_cx' => '016-034', 'name' => 'SITI DZAGHINNA PUTRI ARDSYA'],
            ['kode_cx' => '016-035', 'name' => 'TEGAR ELWIN TRIHARTO'],
            ['kode_cx' => '016-036', 'name' => 'THOUFIQ JABBAR SULTON'],
            ['kode_cx' => '016-037', 'name' => 'VAZRA ILLAHI'],
            ['kode_cx' => '016-038', 'name' => 'WAFIATUL DARWIN'],
            ['kode_cx' => '016-039', 'name' => 'YOVANDRA'],
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
