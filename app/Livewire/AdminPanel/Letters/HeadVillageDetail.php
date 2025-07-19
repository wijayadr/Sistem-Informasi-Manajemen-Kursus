<?php

namespace App\Livewire\AdminPanel\Letters;

use App\Models\Letter\LetterRequest;
use App\Models\Letter\StatusHistory;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use Storage;

#[Title('Detail Penandatanganan Surat')]
class HeadVillageDetail extends Component
{
    public LetterRequest $letter;
    public bool $showSignForm = false;

    public function mount($id): void
    {
        $this->letter = LetterRequest::with(['letterType', 'uploadedDocuments.documentType', 'statusHistory'])
            // ->where('request_status', 'processing')
            ->whereNotNull('file')
            ->findOrFail($id);
    }

    public function toggleSignForm(): void
    {
        $this->showSignForm = !$this->showSignForm;
    }

    public function signLetter(): void
    {
        try {
            // Get the verified file path
            $verifiedFilePath = storage_path('app/public/files/verified-letters/' . $this->letter->file);

            if (!file_exists($verifiedFilePath)) {
                throw new \Exception('File surat tidak ditemukan');
            }

            // Load the document
            $phpWord = new TemplateProcessor($verifiedFilePath);

            // Path to head village signature image
            $signaturePath = storage_path('app/public/signatures/head_village_signature.png');

            if (!file_exists($signaturePath)) {
                throw new \Exception('File tanda tangan kepala desa tidak ditemukan');
            }

            // Replace signature placeholder with actual signature
            $phpWord->setImageValue('qr_code', $signaturePath);

            // Save the signed document
            $signedFileName = 'signed_' . $this->letter->tracking_number . '_' . time() . '.docx';
            $signedFilePath = storage_path('app/public/files/signed-letters/' . $signedFileName);

            // Ensure directory exists
            $directory = dirname($signedFilePath);
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            // $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
            $phpWord->saveAs($signedFilePath);

            // Update letter request
            $this->letter->update([
                'file_signed' => $signedFileName,
                'request_status' => 'completed',
                'completed_at' => now()
            ]);

            // Add status history
            StatusHistory::create([
                'request_id' => $this->letter->id,
                'previous_status' => 'processing',
                'new_status' => 'completed',
                'remarks' => 'Surat telah ditandatangani oleh kepala desa'
            ]);

            $this->showSignForm = false;
            $this->showToastr('success', 'Surat berhasil ditandatangani');

            // Refresh the letter data
            $this->mount($this->letter->id);

        } catch (\Exception $e) {
            $this->showToastr('error', 'Terjadi kesalahan saat menandatangani surat: ' . $e->getMessage());
        }
    }

    public function downloadSignedLetter()
    {
        try {
            $filePath = storage_path('app/public/files/signed-letters/' . $this->letter->file_signed);

            if (!file_exists($filePath)) {
                throw new \Exception('File tidak ditemukan');
            }

            return response()->download($filePath, $this->letter->file_signed);

        } catch (\Exception $e) {
            $this->showToastr('error', 'File tidak dapat diunduh');
        }
    }

    public function render(): View
    {
        return view('livewire.admin-panel.letters.head-village-detail');
    }

    public function showToastr($type, $message): void
    {
        $this->dispatch('show:toastify', type: $type, message: $message);
    }
}
