<?php

namespace Database\Seeders;

use App\Models\Master\Identity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Identity::create([
            'name' => 'Desa X',
            'description' => 'Desa X adalah ....',
            'favicon' => 'favicon.png',
            'logo' => 'logo.png',
            'email' => 'email@gmail.com',
            'address' => 'Jl. X',
            'google_maps' => 'https://maps.google.com/?q=Jl.+Raya+No.+1,+Jakarta',
            'phone' => '08123456789',
            'facebook' => 'https://www.facebook.com/',
            'instagram' => 'https://www.instagram.com/',
            'youtube' => 'https://www.youtube.com/',
            'twitter' => 'https://www.x.com/',
            'vision' => 'Membangun desa yang sejahtera.',
            'mission' => 'Meningkatkan infrastruktur dan pelayanan publik.',
            'display_message' => 'Selamat datang di Desa X, tempat dimana inovasi dan tradisi berpadu untuk kemajuan bersama.',
        ]);
    }
}
