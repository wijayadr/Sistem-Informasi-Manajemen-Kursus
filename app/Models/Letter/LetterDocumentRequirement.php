<?php

namespace App\Models\Letter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterDocumentRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter_type_id',
        'document_type_id'
    ];

    public function letterType()
    {
        return $this->belongsTo(LetterType::class);
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }
}
