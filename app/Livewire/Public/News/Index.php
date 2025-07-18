<?php

namespace App\Livewire\Public\News;

use App\Models\Master\Category;
use App\Models\Master\Event;
use App\Models\Master\News;
use App\Models\Master\School;
use App\Models\Service\Service;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Informasi')]
#[Layout('layouts.guest')]
class Index extends Component
{
    public $activeTab = null;
    public $categories = [];
    public $news = [];
    public $filteredNews = [];

    public function mount()
    {
        $this->categories = Category::all();
        $this->news = News::with('category')->get();

        // Set 'all' as active tab by default to show all news
        $this->activeTab = 'all';
        $this->filteredNews = $this->news;
    }

    public function setActiveTab($categorySlug)
    {
        $this->activeTab = $categorySlug;
        $this->filterNewsByCategory($categorySlug);
    }

    private function filterNewsByCategory($categorySlug)
    {
        if ($categorySlug === 'all') {
            $this->filteredNews = $this->news;
        } else {
            $category = $this->categories->firstWhere('slug', $categorySlug);

            if ($category) {
                $this->filteredNews = $this->news->where('category_id', $category->id);
            } else {
                $this->filteredNews = collect();
            }
        }
    }

    public function render()
    {
        return view('livewire.public.news.index', [
            'categories' => $this->categories,
            'filteredNews' => $this->filteredNews,
            'activeTab' => $this->activeTab
        ]);
    }
}
