<?php

namespace App\Models\Letter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterType extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter_name',
        'description'
    ];

    public function letterRequests()
    {
        return $this->hasMany(LetterRequest::class);
    }

    public function documentRequirements()
    {
        return $this->hasMany(LetterDocumentRequirement::class);
    }

    public function requiredDocumentTypes()
    {
        return $this->belongsToMany(DocumentType::class, 'letter_document_requirements');
    }
}
