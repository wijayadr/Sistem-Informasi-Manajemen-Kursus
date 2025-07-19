<?php

namespace App\Livewire\AdminPanel\Letters;

use App\Models\Letter\LetterRequest;
use App\Models\Letter\StatusHistory;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Detail Verifikasi Surat')]
class SecretaryDetail extends Component
{
    use WithFileUploads;

    public LetterRequest $letter;
    public $verifiedFile;
    public string $adminNotes = '';
    public bool $showVerifyForm = false;

    public function mount($id): void
    {
        $this->letter = LetterRequest::with(['letterType', 'uploadedDocuments.documentType', 'statusHistory'])
            ->findOrFail($id);

        $this->adminNotes = $this->letter->admin_notes ?? '';
    }

    public function toggleVerifyForm(): void
    {
        $this->showVerifyForm = !$this->showVerifyForm;
        $this->resetValidation();
    }

    public function verifyLetter(): void
    {
        $this->validate([
            'verifiedFile' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'adminNotes' => 'nullable|string|max:1000'
        ], [
            'verifiedFile.required' => 'File surat harus diupload',
            'verifiedFile.mimes' => 'File harus berformat PDF, DOC, atau DOCX',
            'verifiedFile.max' => 'Ukuran file maksimal 10MB'
        ]);

        try {
            // Store the verified file
            $fileName = 'verified_' . $this->letter->tracking_number . '_' . time() . '.' . $this->verifiedFile->getClientOriginalExtension();
            $filePath = $this->verifiedFile->storeAs('files/verified-letters', $fileName, 'public');

            // Update letter request
            $this->letter->update([
                'file' => $filePath,
                'admin_notes' => $this->adminNotes,
                'request_status' => 'processing'
            ]);

            // Add status history
            StatusHistory::create([
                'request_id' => $this->letter->id,
                'previous_status' => 'submitted',
                'new_status' => 'processing',
                'remarks' => 'Surat telah diverifikasi oleh sekretaris desa'
            ]);

            $this->showVerifyForm = false;
            $this->verifiedFile = null;
            $this->showToastr('success', 'Surat berhasil diverifikasi dan siap untuk ditandatangani');

            // Refresh the letter data
            $this->mount($this->letter->id);

        } catch (\Exception $e) {
            $this->showToastr('error', 'Terjadi kesalahan saat memverifikasi surat');
        }
    }

    public function rejectLetter()
    {
        $this->validate([
            'adminNotes' => 'required|string|max:1000'
        ], [
            'adminNotes.required' => 'Alasan penolakan harus diisi'
        ]);

        try {
            $this->letter->update([
                'admin_notes' => $this->adminNotes,
                'request_status' => 'rejected'
            ]);

            StatusHistory::create([
                'request_id' => $this->letter->id,
                'previous_status' => 'submitted',
                'new_status' => 'rejected',
                'remarks' => $this->adminNotes
            ]);

            $this->showToastr('success', 'Pengajuan surat telah ditolak');

            return redirect()->route('admin.letters.secretary.index');

        } catch (\Exception $e) {
            $this->showToastr('error', 'Terjadi kesalahan saat menolak surat');
        }
    }

    public function render(): View
    {
        return view('livewire.admin-panel.letters.secretary-detail');
    }

    public function showToastr($type, $message): void
    {
        $this->dispatch('show:toastify', type: $type, message: $message);
    }
}
