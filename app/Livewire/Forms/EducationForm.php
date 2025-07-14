<?php

namespace App\Livewire\Forms;

use App\Models\Statistic\Education;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EducationForm extends Form
{
    public ?Education $education;

    #[Validate('required|integer|min:0')]
    public $no_school = 0;

    #[Validate('required|integer|min:0')]
    public $not_finished_primary = 0;

    #[Validate('required|integer|min:0')]
    public $primary_graduate = 0;

    #[Validate('required|integer|min:0')]
    public $junior_secondary = 0;

    #[Validate('required|integer|min:0')]
    public $senior_secondary = 0;

    #[Validate('required|integer|min:0')]
    public $diploma_i_ii = 0;

    #[Validate('required|integer|min:0')]
    public $diploma_iii = 0;

    #[Validate('required|integer|min:0')]
    public $bachelor = 0;

    #[Validate('required|integer|min:0')]
    public $master = 0;

    #[Validate('required|integer|min:0')]
    public $doctorate = 0;

    public function setEducation(Education $education): void
    {
        $this->education = $education;
        $this->no_school = $education->no_school;
        $this->not_finished_primary = $education->not_finished_primary;
        $this->primary_graduate = $education->primary_graduate;
        $this->junior_secondary = $education->junior_secondary;
        $this->senior_secondary = $education->senior_secondary;
        $this->diploma_i_ii = $education->diploma_i_ii;
        $this->diploma_iii = $education->diploma_iii;
        $this->bachelor = $education->bachelor;
        $this->master = $education->master;
        $this->doctorate = $education->doctorate;
    }

    public function store(): void
    {
        $this->validate();

        Education::create($this->only([
            'no_school',
            'not_finished_primary',
            'primary_graduate',
            'junior_secondary',
            'senior_secondary',
            'diploma_i_ii',
            'diploma_iii',
            'bachelor',
            'master',
            'doctorate',
        ]));

        $this->reset();
    }

    public function update(): void
    {
        $this->validate();

        $this->education->update($this->only([
            'no_school',
            'not_finished_primary',
            'primary_graduate',
            'junior_secondary',
            'senior_secondary',
            'diploma_i_ii',
            'diploma_iii',
            'bachelor',
            'master',
            'doctorate',
        ]));
    }

    /**
     * Get total education statistics
     */
    public function getTotal(): int
    {
        return $this->no_school +
               $this->not_finished_primary +
               $this->primary_graduate +
               $this->junior_secondary +
               $this->senior_secondary +
               $this->diploma_i_ii +
               $this->diploma_iii +
               $this->bachelor +
               $this->master +
               $this->doctorate;
    }
}
