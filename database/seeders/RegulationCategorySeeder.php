<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Regulation\Category as RegulationCategory;

class RegulationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RegulationCategory::insert([
            ['name' => 'Peraturan Desa'],
            ['name' => 'Peraturan Kepala Desa'],
            ['name' => 'Peraturan Bersama Kepala Desa'],
        ]);
    }
}
