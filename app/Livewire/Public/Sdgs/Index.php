<?php

namespace App\Livewire\Public\Sdgs;

use App\Models\Master\Identity;
use App\Models\Sdgs\Goal;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('SDGs')]
#[Layout('layouts.guest')]
class Index extends Component
{
    public function render()
    {
        $goals = Goal::with('progress')->get();
        $identity = Identity::first();
        $average = Goal::averageAchievementValue();

        return view('livewire.public.sdgs.index', compact('goals', 'identity', 'average'));
    }
}
