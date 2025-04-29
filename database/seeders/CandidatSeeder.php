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
                'id' => 1,
                'ketua_name' => 'Wafiatul Darwin',
                'wakil_name' => 'Andre Yanis',
                'nomor_urut' => '01',
                'visi' => "Menjadi UKM unggulan dalam pengembangan sumber daya manusia dibidang teknologi informasi yang berdaya saing, kreatif, serta mampu membangun relasi dan kolaborasi untuk menciptakan inovasi yang berdampak positif bagi kampus dan masyarakat.",
                'misi' => "<ol><li>Meningkatkan kualitas SDM melalui pelatihan, dan pengembangan skill di bidang teknologi.</li><li>Menumbuhkan semangat loyalitas anggota terhadap organisasi dengan sistem kekeluargaan.</li><li>Mendorong budaya berpikir kreatif dan inovatif dalam setiap program kerja dan kegiatan.</li><li>Membangun relasi yang kuat dengan komunitas internal UKM IT Cybernetix.</li><li>Menjalin kolaborasi strategis antar sesama anggota untuk menciptakan projek teknologi yang bermanfaat.</li><li>Memberikan feedback kepada anggota demi kenyamanan dan loyalitas anggota.</li></ol>",
                'image' => '1745829512_.jpg',
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'ketua_name' => 'Aldo Heftrian Zuhri',
                'wakil_name' => 'Jevin Trihatmono',
                'nomor_urut' => '02',
                'visi' => "Mewujudkan UKM-IT Cybernetix sebagai wadah pengembangan sumber daya manusia yang unggul, berdaya saing, dan berkarakter melalui penguatan kebersamaan, komitmen kolektif, serta pemberdayaan minat bakat dalam bidang teknologi informasi, didukung oleh semangat pembelajaran berkelanjutan untuk berkontribusi positif bagi kemajuan kampus dan masyarakat.",
                'misi' => "<ol><li>&nbsp;Menjadikan UKM IT-Cybernetix sebagai wadah pengembangan minat dan bakat anggota melalui penyediaan ruang untuk kreativitas, inovasi, dan pengalaman praktis.</li><li>&nbsp;Membangun lingkungan kolaboratif yang mendorong kebersamaan, sinergi , dan komitmen kolektif antaranggota.</li><li>&nbsp;Memupuk karakter kepemimpinan dan integritas anggota melalui pembiasaan nilai-nilai kedisiplinan, tanggung jawab, dan etika profesional.</li><li>&nbsp;Melaksanakan pelatihan setiap tiga minggu sekali untuk anggota UKM IT-Cybernetix, mencakup pengembangan hardskill dan softskill.</li></ol>",
                'image' => '1745831478_.jpg',
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
