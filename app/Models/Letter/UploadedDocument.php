<?php

namespace App\Models\Letter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'document_type_id',
        'original_filename',
        'system_filename',
        'file_path'
    ];

    public function letterRequest()
    {
        return $this->belongsTo(LetterRequest::class, 'request_id');
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }
}
