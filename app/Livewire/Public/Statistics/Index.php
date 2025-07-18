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
        // Load all active statistics with their categories
        $this->statistics = Statistic::active()
            ->with(['categories' => function ($query) {
                $query->orderBy('value', 'desc');
            }])
            ->get();

        // Calculate total population from age statistics if available
        $ageStatistic = $this->statistics->where('type', 'age')->first();
        if ($ageStatistic) {
            $this->totalPopulation = $ageStatistic->categories->sum('value');
        }

        // Set default values if no data (you can adjust these based on your needs)
        if ($this->totalPopulation == 0) {
            $this->totalPopulation = 1270; // From the HTML table
            $this->malePopulation = 614;
            $this->femalePopulation = 656;
        }
    }

    public function getStatisticByType($type)
    {
        return $this->statistics->where('type', $type)->first();
    }

    public function render()
    {
        return view('livewire.public.statistics.index', [
            'ageStatistic' => $this->getStatisticByType('age'),
            'educationStatistic' => $this->getStatisticByType('education'),
            'jobStatistic' => $this->getStatisticByType('job'),
            'religionStatistic' => $this->getStatisticByType('religion'),
        ]);
    }
}
