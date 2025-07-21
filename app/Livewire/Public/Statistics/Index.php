<?php

namespace App\Livewire\Public\Statistics;

use App\Models\Statistic\Statistic;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Statistik Desa')]
#[Layout('layouts.guest')]
class Index extends Component
{
    public $statistics;
    public $totalPopulation = 0;
    public $malePopulation = 0;
    public $femalePopulation = 0;

    public function mount()
    {
        // Load all active statistics with their categories, ordered
        $this->statistics = Statistic::active()
            // ->ordered()
            ->with('categories')
            ->get();

        // Calculate population data
        $this->calculatePopulationData();
    }

    private function calculatePopulationData()
    {
        // Get age statistics for population calculation
        $ageStatistic = $this->statistics->where('type', 'age')->first();

        if ($ageStatistic && $ageStatistic->total_value > 0) {
            $this->totalPopulation = $ageStatistic->total_value;

            // You can implement gender calculation based on your data structure
            // For now, using default distribution
            $this->malePopulation = round($this->totalPopulation * 0.48);
            $this->femalePopulation = $this->totalPopulation - $this->malePopulation;
        } else {
            // Default values if no data
            $this->totalPopulation = 1270;
            $this->malePopulation = 614;
            $this->femalePopulation = 656;
        }
    }

    public function getStatisticsByType($type)
    {
        return $this->statistics->where('type', $type)->first();
    }

    public function render()
    {
        return view('livewire.public.statistics.index');
    }
}
