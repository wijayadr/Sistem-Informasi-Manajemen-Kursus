<?php

namespace App\Livewire\AdminPanel\Letters;

use App\Models\Letter\LetterRequest;
use App\Models\Letter\StatusHistory;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Detail Surat')]
class Detail extends Component
{
    use WithFileUploads;

    public LetterRequest $letter;
    public string $adminNotes = '';

    public function mount($id): void
    {
        $this->letter = LetterRequest::with(['letterType', 'uploadedDocuments.documentType', 'statusHistory'])
            ->findOrFail($id);

        $this->adminNotes = $this->letter->admin_notes ?? '';
    }

    public function render(): View
    {
        return view('livewire.admin-panel.letters.detail');
    }

    public function showToastr($type, $message): void
    {
        $this->dispatch('show:toastify', type: $type, message: $message);
    }
}
