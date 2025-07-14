<?php

namespace App\Livewire\Forms;

use App\Models\Statistic\Religion;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ReligionForm extends Form
{
    public ?Religion $religion;

    #[Validate('required|integer|min:0')]
    public $islam = 0;

    #[Validate('required|integer|min:0')]
    public $christian = 0;

    #[Validate('required|integer|min:0')]
    public $catholic = 0;

    #[Validate('required|integer|min:0')]
    public $hindu = 0;

    #[Validate('required|integer|min:0')]
    public $buddhist = 0;

    #[Validate('required|integer|min:0')]
    public $confucian = 0;

    #[Validate('required|integer|min:0')]
    public $others = 0;

    public function setReligion(Religion $religion)
    {
        $this->religion = $religion;
        $this->islam = $religion->islam;
        $this->christian = $religion->christian;
        $this->catholic = $religion->catholic;
        $this->hindu = $religion->hindu;
        $this->buddhist = $religion->buddhist;
        $this->confucian = $religion->confucian;
        $this->others = $religion->others;
    }

    public function update()
    {
        $this->validate();

        if ($this->religion->exists) {
            $this->religion->update([
                'islam' => $this->islam,
                'christian' => $this->christian,
                'catholic' => $this->catholic,
                'hindu' => $this->hindu,
                'buddhist' => $this->buddhist,
                'confucian' => $this->confucian,
                'others' => $this->others,
            ]);
        } else {
            Religion::create([
                'islam' => $this->islam,
                'christian' => $this->christian,
                'catholic' => $this->catholic,
                'hindu' => $this->hindu,
                'buddhist' => $this->buddhist,
                'confucian' => $this->confucian,
                'others' => $this->others,
            ]);
        }
    }
}
