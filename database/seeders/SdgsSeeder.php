<?php

namespace Database\Seeders;

use App\Models\Sdgs\Goal;
use App\Models\Sdgs\GoalProgress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SdgsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'number' => 1,
                'title' => 'Desa Tanpa Kemiskinan',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-1.jpg',
                'description' => '',
            ],
            [
                'number' => 2,
                'title' => 'Desa Tanpa Kelaparan',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-2.jpg',
                'description' => '',
            ],
            [
                'number' => 3,
                'title' => 'Desa Sehat dan Sejahtera',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-3.jpg',
                'description' => '',
            ],
            [
                'number' => 4,
                'title' => 'Pendidikan Desa Berkualitas',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-4.jpg',
                'description' => '',
            ],
            [
                'number' => 5,
                'title' => 'Keterlibatan Perempuan Desa',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-5.jpg',
                'description' => '',
            ],
            [
                'number' => 6,
                'title' => 'Desa Layak Air Bersih dan Sanitasi',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-6.jpg',
                'description' => '',
            ],
            [
                'number' => 7,
                'title' => 'Desa Berenergi Bersih dan Terbarukan',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-7.jpg',
                'description' => '',
            ],
            [
                'number' => 8,
                'title' => 'Pertumbuhan Ekonomi Desa Merata',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-8.jpg',
                'description' => '',
            ],
            [
                'number' => 9,
                'title' => 'Infrastruktur dan Inovasi Desa Sesuai Kebutuhan',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-9.jpg',
                'description' => '',
            ],
            [
                'number' => 10,
                'title' => 'Desa Tanpa Kesenjangan',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-10.jpg',
                'description' => '',
            ],
            [
                'number' => 11,
                'title' => 'Kawasan Pemukiman Desa Aman dan Nyaman',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-11.jpg',
                'description' => '',
            ],
            [
                'number' => 12,
                'title' => 'Konsumsi dan Produksi Desa Sadar Lingkungan',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-12.jpg',
                'description' => '',
            ],
            [
                'number' => 13,
                'title' => 'Desa Tanggap Perubahan Iklim',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-13.jpg',
                'description' => '',
            ],
            [
                'number' => 14,
                'title' => 'Desa Peduli Lingkungan Laut',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-14.jpg',
                'description' => '',
            ],
            [
                'number' => 15,
                'title' => 'Desa Peduli Lingkungan Darat',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-15.jpg',
                'description' => '',
            ],
            [
                'number' => 16,
                'title' => 'Desa Damai Berkeadilan',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-16.jpg',
                'description' => '',
            ],
            [
                'number' => 17,
                'title' => 'Kemitraan Untuk Pembangunan Desa',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-17.jpg',
                'description' => '',
            ],
            [
                'number' => 18,
                'title' => 'Kelembagaan Desa Dinamis dan Budaya Desa Adaptif',
                'image_url' => 'https://sid.kemendesa.go.id/website/skor-sdgs-18.jpg',
                'description' => '',
            ],
        ];

        foreach ($data as $item) {
            Goal::create($item);
        }

        $goals = Goal::all();

        foreach ($goals as $goal) {
            GoalProgress::create([
                'goal_id' => $goal->id,
                'achievement_value' => 0, // Initial value
                'notes' => null,
            ]);
        }
    }
}
