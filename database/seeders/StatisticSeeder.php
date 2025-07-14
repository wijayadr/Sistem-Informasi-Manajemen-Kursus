<?php

namespace Database\Seeders;

use App\Models\Statistic\Education;
use App\Models\Statistic\Population;
use App\Models\Statistic\Religion;
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

        Education::create([
            'no_school' => 0,
            'not_finished_primary' => 0,
            'primary_graduate' => 0,
            'junior_secondary' => 0,
            'senior_secondary' => 0,
            'diploma_i_ii' => 0,
            'diploma_iii' => 0,
            'bachelor' => 0,
            'master' => 0,
            'doctorate' => 0,
        ]);

        Religion::create([
            'islam' => 0,
            'christian' => 0,
            'catholic' => 0,
            'hindu' => 0,
            'buddhist' => 0,
            'confucian' => 0,
            'others' => 0,
        ]);
    }
}
