<?php

namespace App\Livewire\Public\Idm;

use App\Models\Master\IdmScore;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Detail extends Component
{
    public ?IdmScore $idm_score;
    public array $statusInfo = [];

    public function mount(IdmScore $idm_score): void
    {
        $this->idm_score = $idm_score;
        $this->calculateStatusInfo();
    }

    private function calculateStatusInfo(): void
    {
        $currentScore = $this->idm_score->idm_score;

        // Determine current status and next target
        if ($currentScore > 0.815) {
            $this->statusInfo = [
                'current_status' => 'Mandiri',
                'target_status' => 'Mandiri (Sudah Mencapai Target Tertinggi)',
                'min_score' => 0.815,
                'next_target_score' => null,
                'color' => 'success'
            ];
        } elseif ($currentScore > 0.707) {
            $this->statusInfo = [
                'current_status' => 'Maju',
                'target_status' => 'Mandiri',
                'min_score' => 0.707,
                'next_target_score' => 0.815,
                'color' => 'info'
            ];
        } elseif ($currentScore > 0.599) {
            $this->statusInfo = [
                'current_status' => 'Berkembang',
                'target_status' => 'Maju',
                'min_score' => 0.599,
                'next_target_score' => 0.707,
                'color' => 'warning'
            ];
        } elseif ($currentScore > 0.491) {
            $this->statusInfo = [
                'current_status' => 'Tertinggal',
                'target_status' => 'Berkembang',
                'min_score' => 0.491,
                'next_target_score' => 0.599,
                'color' => 'danger'
            ];
        } else {
            $this->statusInfo = [
                'current_status' => 'Sangat Tertinggal',
                'target_status' => 'Tertinggal',
                'min_score' => 0,
                'next_target_score' => 0.491,
                'color' => 'dark'
            ];
        }
    }

    public function render()
    {
        $title = "Detail IDM Tahun {$this->idm_score->year}";

        return view('livewire.public.idm.detail')->title($title);
    }
}
