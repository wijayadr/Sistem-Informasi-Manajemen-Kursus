<?php

namespace App\Livewire\Public\Home;

use App\Models\Master\Category;
use App\Models\Master\Identity;
use App\Models\Master\News;
use App\Models\Master\NewsCategory;
use App\Models\Master\Slider;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Beranda')]
#[Layout('layouts.guest')]
class Index extends Component
{
    public $activeTab = 'all';

    public function mount()
    {
        $this->activeTab = 'all';
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        $identity = Identity::find(1);
        $sliders = Slider::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        $categories = Category::orderBy('nama', 'asc')->get();

        // Get news based on active tab
        $newsQuery = News::with(['category', 'creator'])
            ->orderBy('created_at', 'desc');

        if ($this->activeTab !== 'all') {
            $newsQuery->whereHas('category', function($query) {
                $query->where('slug', $this->activeTab);
            });
        }

        $news = $newsQuery->limit(8)->get();

        return view('livewire.public.home.index', compact('identity', 'sliders', 'categories', 'news'));
    }
}
