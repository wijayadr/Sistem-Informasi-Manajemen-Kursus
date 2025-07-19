<?php

namespace App\Livewire\Public\Letters;

use App\Models\Letter\DocumentType;
use App\Models\Letter\LetterRequest;
use App\Models\Letter\LetterType;
use App\Models\Letter\StatusHistory;
use App\Models\Letter\UploadedDocument;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.guest')]
class Detail extends Component
{
    use WithFileUploads;

    public $letterType;
    public $requiredDocuments = [];
    public $uploadedFiles = [];

    // Form fields
    public $applicant_name = '';
    public $phone_number = '';
    public $email = '';
    public $purpose = '';

    // Validation rules
    protected $rules = [
        'applicant_name' => 'required|string|max:100',
        'phone_number' => 'nullable|string|max:15',
        'email' => 'nullable|email|max:100',
        'purpose' => 'nullable|string',
        'uploadedFiles.*' => 'nullable|file|max:5120' // 5MB max
    ];

    protected $messages = [
        'applicant_name.required' => 'Nama pemohon harus diisi.',
        'applicant_name.max' => 'Nama pemohon maksimal 100 karakter.',
        'phone_number.max' => 'Nomor telepon maksimal 15 karakter.',
        'email.email' => 'Format email tidak valid.',
        'email.max' => 'Email maksimal 100 karakter.',
        'uploadedFiles.*.file' => 'File yang diupload harus berupa file.',
        'uploadedFiles.*.max' => 'Ukuran file maksimal 5MB.'
    ];

    public function mount($letter_type)
    {
        $this->letterType = LetterType::with(['requiredDocumentTypes'])->findOrFail($letter_type);
        $this->requiredDocuments = $this->letterType->requiredDocumentTypes;

        // Initialize uploadedFiles array
        foreach ($this->requiredDocuments as $doc) {
            $this->uploadedFiles[$doc->id] = null;
        }
    }

    public function submitRequest()
    {
        $this->validate();

        // Validate required document uploads
        foreach ($this->requiredDocuments as $doc) {
            if (!isset($this->uploadedFiles[$doc->id]) || !$this->uploadedFiles[$doc->id]) {
                $this->addError("uploadedFiles.{$doc->id}", "Dokumen {$doc->document_name} harus diupload.");
                return;
            }

            // Validate file format
            $file = $this->uploadedFiles[$doc->id];
            $allowedFormats = $doc->getAllowedFormatsArray();
            $fileExtension = $file->getClientOriginalExtension();

            if (!in_array(strtolower($fileExtension), array_map('strtolower', $allowedFormats))) {
                $this->addError("uploadedFiles.{$doc->id}", "Format file {$doc->document_name} harus: " . implode(', ', $allowedFormats));
                return;
            }

            // Validate file size
            $fileSizeInMB = $file->getSize() / 1024 / 1024;
            if ($fileSizeInMB > $doc->max_size_mb) {
                $this->addError("uploadedFiles.{$doc->id}", "Ukuran file {$doc->document_name} maksimal {$doc->max_size_mb}MB.");
                return;
            }
        }

        try {
            // Create letter request
            $letterRequest = LetterRequest::create([
                'letter_type_id' => $this->letterType->id,
                'applicant_name' => $this->applicant_name,
                'phone_number' => $this->phone_number,
                'email' => $this->email,
                'purpose' => $this->purpose,
                'request_status' => 'submitted',
                'submitted_at' => now()
            ]);

            // Create status history
            StatusHistory::create([
                'request_id' => $letterRequest->id,
                'previous_status' => null,
                'new_status' => 'submitted',
                'remarks' => 'Permohonan surat berhasil diajukan',
                'changed_at' => now()
            ]);

            // Upload and save documents
            foreach ($this->requiredDocuments as $doc) {
                if (isset($this->uploadedFiles[$doc->id]) && $this->uploadedFiles[$doc->id]) {
                    $file = $this->uploadedFiles[$doc->id];
                    $originalName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $systemFileName = $letterRequest->tracking_number . '_' . $doc->document_name . '_' . time() . '.' . $extension;

                    // Store file
                    $filePath = $file->storeAs('files/letter-documents/' . $letterRequest->tracking_number, $systemFileName, 'public');

                    // Save to database
                    UploadedDocument::create([
                        'request_id' => $letterRequest->id,
                        'document_type_id' => $doc->id,
                        'original_filename' => $originalName,
                        'system_filename' => $systemFileName,
                        'file_path' => $filePath
                    ]);
                }
            }

            session()->flash('success', 'Permohonan surat berhasil diajukan dengan nomor tracking: ' . $letterRequest->tracking_number);

            // Reset form
            $this->reset(['applicant_name', 'phone_number', 'email', 'purpose', 'uploadedFiles']);
            foreach ($this->requiredDocuments as $doc) {
                $this->uploadedFiles[$doc->id] = null;
            }

        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function removeFile($documentTypeId)
    {
        $this->uploadedFiles[$documentTypeId] = null;
    }

    public function render()
    {
        return view('livewire.public.letters.detail');
    }
}
