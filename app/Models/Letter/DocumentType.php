<?php

namespace App\Models\Letter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_name',
        'description',
        'allowed_formats',
        'max_size_mb'
    ];

    protected $casts = [
        'max_size_mb' => 'integer'
    ];

    public function letterRequirements()
    {
        return $this->hasMany(LetterDocumentRequirement::class);
    }

    public function letterTypes()
    {
        return $this->belongsToMany(LetterType::class, 'letter_document_requirements');
    }

    public function uploadedDocuments()
    {
        return $this->hasMany(UploadedDocument::class);
    }

    public function getAllowedFormatsArray()
    {
        return explode(',', $this->allowed_formats);
    }
}
