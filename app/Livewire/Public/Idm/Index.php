<?php

namespace App\Livewire\Public\Idm;

use App\Models\Master\IdmScore;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('SDGs')]
#[Layout('layouts.guest')]
class Index extends Component
{
    public function render()
    {
        $idm_scores = IdmScore::all()->sortByDesc('year');

        return view('livewire.public.idm.index', compact('idm_scores'));
    }
}
