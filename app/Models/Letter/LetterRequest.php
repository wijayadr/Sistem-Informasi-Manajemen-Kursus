<?php

namespace App\Models\Letter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_number',
        'letter_type_id',
        'applicant_name',
        'phone_number',
        'email',
        'purpose',
        'request_status',
        'file',
        'file_signed',
        'admin_notes',
        'submitted_at',
        'completed_at'
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'completed_at' => 'datetime'
    ];

    public function letterType()
    {
        return $this->belongsTo(LetterType::class);
    }

    public function uploadedDocuments()
    {
        return $this->hasMany(UploadedDocument::class, 'request_id');
    }

    public function statusHistory()
    {
        return $this->hasMany(StatusHistory::class, 'request_id');
    }

    public function generateTrackingNumber()
    {
        return 'REQ-' . date('Ymd') . '-' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->tracking_number)) {
                $model->tracking_number = 'TMP-' . uniqid();
            }
        });

        static::created(function ($model) {
            if (strpos($model->tracking_number, 'TMP-') === 0) {
                $model->tracking_number = $model->generateTrackingNumber();
                $model->saveQuietly();
            }
        });
    }
}
