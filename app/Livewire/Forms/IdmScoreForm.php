<?php

namespace App\Livewire\Forms;

use App\Models\Master\IdmScore;
use Livewire\Attributes\Rule;
use Livewire\Form;

class IdmScoreForm extends Form
{
    public ?IdmScore $idmScore = null;

    #[Rule('required|integer|min:2020|max:2030')]
    public $year = null;

    #[Rule('required|numeric|min:0|max:1')]
    public $iks = 0;

    #[Rule('required|numeric|min:0|max:1')]
    public $ike = 0;

    #[Rule('required|numeric|min:0|max:1')]
    public $ikl = 0;

    #[Rule('required|numeric|min:0|max:1')]
    public $idm_score = 0;

    #[Rule('required|in:Sangat Tertinggal,Tertinggal,Berkembang,Maju,Mandiri')]
    public $idm_status = '';

    public function setIdmScore(IdmScore $idmScore): void
    {
        $this->idmScore = $idmScore;
        $this->year = $idmScore->year;
        $this->iks = $idmScore->iks;
        $this->ike = $idmScore->ike;
        $this->ikl = $idmScore->ikl;
        $this->idm_score = $idmScore->idm_score;
        $this->idm_status = $idmScore->idm_status;
    }

    public function store(): void
    {
        $this->validate();

        IdmScore::create($this->except('idmScore'));

        $this->reset();
    }

    public function update(): void
    {
        $this->validate();

        $this->idmScore->update($this->except('idmScore'));

        $this->reset();
    }

    public function calculateIdmScore(): void
    {
        // Hitung IDM Score berdasarkan rumus: IDM = 1/3 (IS + IEK + IL)
        if ($this->iks && $this->ike && $this->ikl) {
            $this->idm_score = round(($this->iks + $this->ike + $this->ikl) / 3, 3);
            $this->determineStatus();
        }
    }

    private function determineStatus(): void
    {
        // Tentukan status berdasarkan skor IDM dengan ambang batas yang baru
        if ($this->idm_score > 0.815) {
            $this->idm_status = 'Mandiri';
        } elseif ($this->idm_score > 0.707) {
            $this->idm_status = 'Maju';
        } elseif ($this->idm_score > 0.599) {
            $this->idm_status = 'Berkembang';
        } elseif ($this->idm_score > 0.491) {
            $this->idm_status = 'Tertinggal';
        } else {
            $this->idm_status = 'Sangat Tertinggal';
        }
    }
}
