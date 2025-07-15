<?php

namespace Database\Seeders;

use App\Models\Statistic\Education;
use App\Models\Statistic\Population;
use App\Models\Statistic\Religion;
use App\Models\Statistic\Statistic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Population::create([
        //     'total_population' => 0,
        //     'head_of_family' => 0,
        //     'male' => 0,
        //     'female' => 0,
        //     'temporary_residents' => 0,
        //     'population_mutation' => 0,
        //     'unmarried' => 0,
        //     'married' => 0,
        //     'divorced_alive' => 0,
        //     'divorced_dead' => 0,
        // ]);

        // Education::create([
        //     'no_school' => 0,
        //     'not_finished_primary' => 0,
        //     'primary_graduate' => 0,
        //     'junior_secondary' => 0,
        //     'senior_secondary' => 0,
        //     'diploma_i_ii' => 0,
        //     'diploma_iii' => 0,
        //     'bachelor' => 0,
        //     'master' => 0,
        //     'doctorate' => 0,
        // ]);

        // Religion::create([
        //     'islam' => 0,
        //     'christian' => 0,
        //     'catholic' => 0,
        //     'hindu' => 0,
        //     'buddhist' => 0,
        //     'confucian' => 0,
        //     'others' => 0,
        // ]);

        // Statistik Agama
        $religionStat = Statistic::create([
            'type' => 'religion',
            'name' => 'Statistik Agama',
            'year' => now()->year,
            'chart_type' => 'pie',
            'description' => 'Statistik jumlah penduduk berdasarkan agama',
            'is_active' => true,
        ]);

        $religionStat->categories()->createMany([
            ['category' => 'Islam', 'value' => 0, 'color' => '#10B981'],
            ['category' => 'Kristen', 'value' => 0, 'color' => '#3B82F6'],
            ['category' => 'Katolik', 'value' => 0, 'color' => '#8B5CF6'],
            ['category' => 'Hindu', 'value' => 0, 'color' => '#F59E0B'],
            ['category' => 'Buddha', 'value' => 0, 'color' => '#EF4444'],
            ['category' => 'Konghucu', 'value' => 0, 'color' => '#6B7280'],
        ]);

        // Statistik Pendidikan
        $educationStat = Statistic::create([
            'type' => 'education',
            'name' => 'Statistik Pendidikan',
            'year' => now()->year,
            'chart_type' => 'bar',
            'description' => 'Statistik jumlah penduduk berdasarkan tingkat pendidikan',
            'is_active' => true,
        ]);

        $educationStat->categories()->createMany([
            ['category' => 'Tidak Sekolah', 'value' => 0, 'color' => '#EF4444'],
            ['category' => 'SD/Sederajat', 'value' => 0, 'color' => '#F59E0B'],
            ['category' => 'SMP/Sederajat', 'value' => 0, 'color' => '#10B981'],
            ['category' => 'SMA/Sederajat', 'value' => 0, 'color' => '#3B82F6'],
            ['category' => 'Diploma', 'value' => 0, 'color' => '#8B5CF6'],
            ['category' => 'Sarjana', 'value' => 0, 'color' => '#06B6D4'],
            ['category' => 'Pascasarjana', 'value' => 0, 'color' => '#84CC16'],
        ]);

        // Statistik Pekerjaan
        $jobStat = Statistic::create([
            'type' => 'job',
            'name' => 'Statistik Pekerjaan',
            'year' => now()->year,
            'chart_type' => 'doughnut',
            'description' => 'Statistik jumlah penduduk berdasarkan jenis pekerjaan',
            'is_active' => true,
        ]);

        $jobStat->categories()->createMany([
            ['category' => 'Petani', 'value' => 0, 'color' => '#10B981'],
            ['category' => 'Pedagang', 'value' => 0, 'color' => '#3B82F6'],
            ['category' => 'PNS', 'value' => 0, 'color' => '#8B5CF6'],
            ['category' => 'TNI/POLRI', 'value' => 0, 'color' => '#EF4444'],
            ['category' => 'Swasta', 'value' => 0, 'color' => '#F59E0B'],
            ['category' => 'Wiraswasta', 'value' => 0, 'color' => '#06B6D4'],
            ['category' => 'Tidak Bekerja', 'value' => 0, 'color' => '#6B7280'],
        ]);

        // Statistik Usia
        $ageStat = Statistic::create([
            'type' => 'age',
            'name' => 'Statistik Kelompok Usia',
            'year' => now()->year,
            'chart_type' => 'bar',
            'description' => 'Statistik jumlah penduduk berdasarkan kelompok usia',
            'is_active' => true,
        ]);

        $ageStat->categories()->createMany([
            ['category' => '0-5 tahun', 'value' => 0, 'color' => '#10B981'],
            ['category' => '6-17 tahun', 'value' => 0, 'color' => '#3B82F6'],
            ['category' => '18-30 tahun', 'value' => 0, 'color' => '#8B5CF6'],
            ['category' => '31-45 tahun', 'value' => 0, 'color' => '#F59E0B'],
            ['category' => '46-60 tahun', 'value' => 0, 'color' => '#EF4444'],
            ['category' => '60+ tahun', 'value' => 0, 'color' => '#6B7280'],
        ]);
    }
}
