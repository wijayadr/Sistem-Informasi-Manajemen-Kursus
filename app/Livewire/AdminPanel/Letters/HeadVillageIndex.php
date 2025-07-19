<?php

namespace App\Livewire\AdminPanel\Letters;

use App\Models\Letter\LetterRequest;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Penandatanganan Surat - Kepala Desa')]
class HeadVillageIndex extends Component
{
    use WithPagination;

    #[Url()]
    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        $letters = LetterRequest::with(['letterType'])
            ->where('request_status', 'processing') // Only show verified letters
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('tracking_number', 'like', '%' . $this->search . '%')
                      ->orWhere('applicant_name', 'like', '%' . $this->search . '%');
                });
            })
            ->whereNotNull('file') // Must have verified file
            ->orderBy('submitted_at', 'desc')
            ->paginate(10);

        return view('livewire.admin-panel.letters.head-village-index', compact('letters'));
    }

    public function showToastr($type, $message): void
    {
        $this->dispatch('show:toastify', type: $type, message: $message);
    }
}
