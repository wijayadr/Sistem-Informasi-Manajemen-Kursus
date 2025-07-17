<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IdmScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'iks',
        'ike',
        'ikl',
        'idm_score',
        'idm_status'
    ];

    protected $casts = [
        'iks' => 'decimal:4',
        'ike' => 'decimal:4',
        'ikl' => 'decimal:4',
        'idm_score' => 'decimal:4',
        'year' => 'integer'
    ];

    public function getStatusColorAttribute(): string
    {
        return match ($this->idm_status) {
            'Sangat Tertinggal' => 'danger',
            'Tertinggal' => 'warning',
            'Berkembang' => 'info',
            'Maju' => 'success',
            'Mandiri' => 'primary',
            default => 'secondary'
        };
    }

    public static function getStatusOptions(): array
    {
        return [
            'Sangat Tertinggal' => 'Sangat Tertinggal',
            'Tertinggal' => 'Tertinggal',
            'Berkembang' => 'Berkembang',
            'Maju' => 'Maju',
            'Mandiri' => 'Mandiri'
        ];
    }

    // Scope untuk filter berdasarkan tahun
    public function scopeByYear($query, $year)
    {
        return $query->where('year', $year);
    }

    // Scope untuk filter berdasarkan status
    public function scopeByStatus($query, $status)
    {
        return $query->where('idm_status', $status);
    }
}
