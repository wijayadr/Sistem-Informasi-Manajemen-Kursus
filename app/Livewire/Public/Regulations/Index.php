<?php

namespace App\Livewire\Public\Regulations;

use App\Models\Regulation\Category;
use App\Models\Regulation\Regulation;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Regulasi & Peraturan')]
#[Layout('layouts.guest')]
class Index extends Component
{
    use WithPagination;

    #[Url(as: 'kategori')]
    public $selectedCategory = null;

    #[Url(as: 'search')]
    public $searchTerm = '';

    public $categories;

    public function mount()
    {
        $this->categories = Category::withCount('regulations')->get();
    }

    public function selectCategory($categoryId = null)
    {
        $this->selectedCategory = $categoryId;
        $this->resetPage();
    }

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->selectedCategory = null;
        $this->searchTerm = '';
        $this->resetPage();
    }

    public function render()
    {
        $query = Regulation::with('category');

        if ($this->selectedCategory) {
            $query->where('regulation_category_id', $this->selectedCategory);
        }

        if ($this->searchTerm) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
            });
        }

        $regulations = $query->latest()->paginate(12);

        $selectedCategoryName = $this->selectedCategory
            ? Category::find($this->selectedCategory)?->name
            : null;

        return view('livewire.public.regulations.index', [
            'regulations' => $regulations,
            'selectedCategoryName' => $selectedCategoryName
        ]);
    }
}
