<?php

namespace App\Livewire\AdminPanel\Letters;

use App\Models\Letter\LetterRequest;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Verifikasi Surat - Sekretaris Desa')]
class SecretaryIndex extends Component
{
    use WithPagination;

    #[Url()]
    public string $search = '';

    #[Url()]
    public string $status = '';

    public function mount(): void
    {
        $this->status = 'submitted'; // Default to submitted letters
    }

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
            ->when($this->status, fn ($query) => $query->where('request_status', $this->status))
            ->orderBy('submitted_at', 'desc')
            ->paginate(10);

        return view('livewire.admin-panel.letters.secretary-index', compact('letters'));
    }

    public function showToastr($type, $message): void
    {
        $this->dispatch('show:toastify', type: $type, message: $message);
    }
}
