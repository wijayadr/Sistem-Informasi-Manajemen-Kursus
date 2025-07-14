<?php

namespace Database\Seeders;

use App\Models\Statistic\Population;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Population::create([
            'total_population' => 0,
            'head_of_family' => 0,
            'male' => 0,
            'female' => 0,
            'temporary_residents' => 0,
            'population_mutation' => 0,
            'unmarried' => 0,
            'married' => 0,
            'divorced_alive' => 0,
            'divorced_dead' => 0,
        ]);
    }
}
