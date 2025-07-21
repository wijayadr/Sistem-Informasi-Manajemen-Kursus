<?php

namespace App\Livewire\AdminPanel\Dashboard;

use App\Models\Letter\LetterRequest;
use App\Models\Master\Event;
use App\Models\Master\News;
use App\Models\Master\Slider;
use App\Models\Statistic\Statistic;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Index extends Component
{
    public function render(): View
    {
        $data = [
            'news' => News::all()->count(),
            'events' => Event::all()->count(),
            'users' => User::all()->count(),
            'sliders' => Slider::all()->count(),
            'statistics' => Statistic::all()->count(),
            'letters' => LetterRequest::all()->count(),
        ];

        return view('livewire.admin-panel.dashboard.index', compact('data'));
    }
}
