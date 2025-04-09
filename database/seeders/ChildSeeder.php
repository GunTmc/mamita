<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $growthData = [
            1 => [4.5, 54.7, 36.5],
            2 => [5.6, 58.4, 38.0],
            3 => [6.4, 61.4, 39.1],
            4 => [7.0, 63.9, 40.0],
            5 => [7.5, 65.9, 40.7],
            6 => [7.9, 67.6, 41.3],
            9 => [8.9, 72.0, 42.4],
            12 => [9.6, 75.7, 43.0],
            15 => [10.5, 80.0, 44.0],
            18 => [11.5, 83.0, 45.0],
            24 => [12.2, 87.1, 46.0],
            36 => [14.3, 96.1, 48.5],
            48 => [16.3, 103.3, 49.5],
            60 => [18.3, 110.0, 50.0],
        ];

        $milestones = [
            1 => 'Aku mulai mengenali suara dan menoleh ke arah suara Mama atau Papa.',
            2 => 'Aku bisa tersenyum untuk pertama kalinya saat melihat wajah yang familiar.',
            3 => 'Aku mulai menggunakan ekspresi wajah dan bahasa tubuh untuk berkomunikasi.',
            4 => 'Aku bisa mengangkat kepala saat tengkurap dan mulai tertarik melihat mainan.',
            5 => 'Aku mulai mencoba meraih mainan dan tertawa saat diajak bermain.',
            6 => 'Aku bisa berguling dan mulai duduk dengan bantuan.',
            9 => 'Aku bisa duduk sendiri dan meraih benda yang jauh dari jangkauan.',
            12 => 'Aku bisa berdiri berpegangan dan mengucapkan kata sederhana seperti “mama” atau “papa”.',
            15 => 'Aku mulai berjalan beberapa langkah tanpa bantuan.',
            18 => 'Aku bisa menunjuk benda yang aku inginkan dan mengikuti perintah sederhana.',
            24 => 'Aku bisa berlari, menyebutkan bagian tubuh, dan menyusun dua kata.',
            36 => 'Aku suka bertanya “kenapa” dan mulai bermain dengan anak lain.',
            48 => 'Aku bisa menggambar bentuk sederhana dan memakai pakaian sendiri.',
            60 => 'Aku sudah siap masuk sekolah! Aku bisa menghitung, mengenal warna, dan mengikuti aturan.',
        ];

        $vaccineSchedule = [
            1 => 'DTP-HB-Hib 1, Polio 2',
            2 => 'DTP-HB-Hib 2, Polio 3, Rotavirus 1',
            3 => 'DTP-HB-Hib 3, Polio 4, Rotavirus 2',
            4 => 'PCV 1',
            5 => 'PCV 2',
            6 => 'Influenza 1',
            9 => 'Campak-Rubella 1',
            12 => 'PCV 3, Influenza 2',
            15 => 'DTP-HB-Hib lanjutan, Campak-Rubella 2, JE',
            18 => 'Hepatitis A',
            24 => 'Varicella',
            60 => 'Td booster',
        ];


        foreach ($growthData as $age => $data) {
            $weight = $data[0] ?? null;
            $height = $data[1] ?? null;
            $headCirc = $data[2] ?? null;

            $vaccine = $vaccineSchedule[$age] ?? null;
            $note = $milestones[$age] ?? 'Pantau tumbuh kembang anak setiap bulan.';

            DB::table('children')->insert([
                'id' => Uuid::uuid4(),
                'age' => $age,
                'height' => (string) $height,
                'weight' => (string) $weight,
                'note' => $note,
                'head_circumference' => (string) $headCirc,
                'vaccine' => $vaccine,
            ]);
        }
    }
}
