<?php

namespace App\Livewire\Public\Letters;

use App\Models\Letter\LetterRequest;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Tracking extends Component
{
    public $tracking_number = '';
    public $letterRequest = null;
    public $statusHistory = null;
    public $notFound = false;

    protected $rules = [
        'tracking_number' => 'required|string'
    ];

    protected $messages = [
        'tracking_number.required' => 'Nomor tracking harus diisi.'
    ];

    public function searchRequest()
    {
        $this->validate();

        $this->letterRequest = LetterRequest::with([
            'letterType',
            'uploadedDocuments.documentType',
            'statusHistory' => function($query) {
                $query->orderBy('changed_at', 'desc');
            }
        ])->where('tracking_number', $this->tracking_number)->first();

        if ($this->letterRequest) {
            $this->statusHistory = $this->letterRequest->statusHistory;
            $this->notFound = false;
        } else {
            $this->notFound = true;
            $this->letterRequest = null;
            $this->statusHistory = null;
        }
    }

    public function resetSearch()
    {
        $this->reset(['tracking_number', 'letterRequest', 'statusHistory', 'notFound']);
    }

    public function getStatusColor($status)
    {
        return match($status) {
            'draft' => 'secondary',
            'submitted' => 'primary',
            'processing' => 'warning',
            'completed' => 'success',
            'rejected' => 'danger',
            default => 'secondary'
        };
    }

    public function getStatusText($status)
    {
        return match($status) {
            'draft' => 'Draft',
            'submitted' => 'Diajukan',
            'processing' => 'Diproses',
            'completed' => 'Selesai',
            'rejected' => 'Ditolak',
            default => 'Tidak Diketahui'
        };
    }

    public function render()
    {
        return view('livewire.public.letters.tracking');
    }
}
