<?php

namespace App\Livewire\Forms;

use App\Models\Statistic\Population;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PopulationForm extends Form
{
    public ?Population $population = null;

    #[Validate('required|integer|min:0')]
    public $total_population = 0;

    #[Validate('required|integer|min:0')]
    public $head_of_family = 0;

    #[Validate('required|integer|min:0')]
    public $male = 0;

    #[Validate('required|integer|min:0')]
    public $female = 0;

    #[Validate('required|integer|min:0')]
    public $temporary_residents = 0;

    #[Validate('required|integer|min:0')]
    public $population_mutation = 0;

    #[Validate('required|integer|min:0')]
    public $unmarried = 0;

    #[Validate('required|integer|min:0')]
    public $married = 0;

    #[Validate('required|integer|min:0')]
    public $divorced_alive = 0;

    #[Validate('required|integer|min:0')]
    public $divorced_dead = 0;

    public function setPopulation(Population $population): void
    {
        $this->population = $population;
        $this->total_population = $population->total_population;
        $this->head_of_family = $population->head_of_family;
        $this->male = $population->male;
        $this->female = $population->female;
        $this->temporary_residents = $population->temporary_residents;
        $this->population_mutation = $population->population_mutation;
        $this->unmarried = $population->unmarried;
        $this->married = $population->married;
        $this->divorced_alive = $population->divorced_alive;
        $this->divorced_dead = $population->divorced_dead;
    }

    public function store(): void
    {
        $this->validate();

        Population::create($this->only([
            'total_population',
            'head_of_family',
            'male',
            'female',
            'temporary_residents',
            'population_mutation',
            'unmarried',
            'married',
            'divorced_alive',
            'divorced_dead',
        ]));

        $this->reset();
    }

    public function update(): void
    {
        $this->validate();

        $this->population->update($this->only([
            'total_population',
            'head_of_family',
            'male',
            'female',
            'temporary_residents',
            'population_mutation',
            'unmarried',
            'married',
            'divorced_alive',
            'divorced_dead',
        ]));
    }
}
