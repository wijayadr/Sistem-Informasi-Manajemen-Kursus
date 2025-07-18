<?php

namespace App\Livewire\Public\Home;

use App\Models\Master\Identity;
use App\Models\Master\Slider;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Beranda')]
#[Layout('layouts.guest')]
class Index extends Component
{
    public function render()
    {
        $identity = Identity::find(1);
        $sliders = Slider::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('livewire.public.home.index', compact('identity', 'sliders'));
    }
}
