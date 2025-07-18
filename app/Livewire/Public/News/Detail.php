<?php

namespace App\Livewire\Public\News;

use App\Models\Master\News;
use App\Models\Master\Category;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
class Detail extends Component
{
    public ?News $news;

    public function mount(News $news): void
    {
        // Load relationships to avoid N+1 queries
        $this->news = $news->load(['category', 'creator']);

        // Increment views
        // $this->incrementViews();
    }

    public function render(): View
    {
        $title = $this->news->judul;

        // Get other news excluding current one, with relationships loaded
        $otherNews = News::with(['category', 'creator'])
            ->where('id', '!=', $this->news->id)
            ->latest()
            ->limit(4)
            ->get();

        return view('livewire.public.news.detail', compact('otherNews'))->title($title);
    }

    private function incrementViews(): void
    {
        // Increment views count
        $this->news->increment('views');

        // Or if you want to prevent multiple increments in same session:
        // $sessionKey = 'news_viewed_' . $this->news->id;
        // if (!session()->has($sessionKey)) {
        //     $this->news->increment('views');
        //     session()->put($sessionKey, true);
        // }
    }
}
