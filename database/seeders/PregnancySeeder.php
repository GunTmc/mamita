<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PregnancySeeder extends Seeder
{
    public function run()
    {
        $notes = [
            "Embrio baru saja terbentuk! Berisi lebih dari 100 sel, ukurannya tidak lebih besar dari ujung jarum.",
            "Sel-sel mulai membelah dan membentuk lapisan-lapisan untuk organ tubuh.",
            "Plasenta mulai terbentuk untuk menyuplai nutrisi ke embrio.",
            "Tabung saraf mulai berkembang, menjadi cikal bakal otak dan sumsum tulang belakang.",
            "Jantung embrio mulai berdetak, meskipun masih sangat kecil.",
            "Bentuk dasar wajah mulai terlihat, termasuk mata dan lubang telinga.",
            "Lengan dan tungkai kecil mulai tumbuh.",
            "Embrio mulai bergerak, meskipun ibu belum bisa merasakannya.",
            "Organ dasar seperti hati, ginjal, dan paru-paru mulai terbentuk.",
            "Janin sekarang berukuran sekitar 3 cm, dan semua organ utama sudah mulai terbentuk.",
            "Janin mulai membuka dan menutup tangannya.",
            "Kuku dan rambut halus mulai tumbuh.",
            "Tulang-tulang mulai mengeras, dan janin bisa mengisap jempol.",
            "Jenis kelamin janin mulai bisa dikenali lewat USG.",
            "Janin sudah bisa membuat ekspresi wajah seperti menguap.",
            "Pendengaran mulai terbentuk, janin mulai mendengar suara dari luar.",
            "Pergerakan janin makin aktif, meskipun masih terasa lembut.",
            "Sistem pencernaan janin mulai berfungsi.",
            "Kulit janin masih sangat tipis dan transparan.",
            "Janin bisa merespons suara dan cahaya dari luar rahim.",
            "Janin mulai menelan cairan ketuban sebagai latihan sistem cerna.",
            "Kelopak mata mulai terbuka sedikit demi sedikit.",
            "Bulu halus (lanugo) tumbuh di seluruh tubuh janin.",
            "Gerakan janin semakin terasa oleh ibu.",
            "Paru-paru mulai berkembang lebih matang.",
            "Janin sudah punya jadwal tidur dan bangun.",
            "Sidik jari janin sudah terbentuk dengan sempurna.",
            "Lemak mulai disimpan di bawah kulit untuk mengatur suhu tubuh.",
            "Mata janin bisa berkedip dan bereaksi terhadap cahaya.",
            "Tulang semakin keras dan kuat.",
            "Janin bisa bermimpi saat tidur di dalam rahim.",
            "Posisi kepala mulai mengarah ke bawah sebagai persiapan lahir.",
            "Kulit janin menjadi lebih halus, lemak bertambah.",
            "Paru-paru hampir matang, janin bisa bertahan jika lahir dini.",
            "Janin mulai menendang lebih keras, bahkan bisa terlihat dari luar.",
            "Kepala janin masuk ke panggul ibu, tanda-tanda persalinan makin dekat.",
            "Berat badan janin meningkat dengan cepat.",
            "Janin makin sering berlatih bernapas meski masih di air ketuban.",
            "Gerakan janin sedikit berkurang karena ruang yang makin sempit.",
            "Persiapan akhir persalinan, ibu mulai merasakan kontraksi palsu.",
            "Janin siap lahir kapan saja! Semua organ sudah matang sepenuhnya.",
        ];

        $data = [];

        foreach ($notes as $i => $note) {
            $data[] = [
                'id' => (string) Str::uuid(),
                'gestational_age' => ($i + 1),
                'note' => $note,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('pregnancies')->insert($data);
    }
}
