<?php

namespace App\Livewire\AdminPanel\Letters;

use App\Models\Letter\LetterRequest;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\View\View;

#[Title('Daftar Surat Desa')]
class Index extends Component
{
    use WithPagination;

    #[Url()]
    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingStatus(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        $letters = LetterRequest::with(['letterType', 'uploadedDocuments'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('tracking_number', 'like', '%' . $this->search . '%')
                      ->orWhere('applicant_name', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('submitted_at', 'desc')
            ->paginate(10);

        return view('livewire.admin-panel.letters.index', compact('letters'));
    }
}
