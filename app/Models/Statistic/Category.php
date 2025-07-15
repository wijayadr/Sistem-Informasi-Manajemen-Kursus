<?php

namespace App\Models\Statistic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $table = 'statistic_categories';

    protected $fillable = [
        'statistic_id',
        'category',
        'value',
        'color',
    ];

    protected $casts = [
        'value' => 'integer',
    ];

    public function statistic(): BelongsTo
    {
        return $this->belongsTo(Statistic::class);
    }

    public function getPercentageAttribute()
    {
        $total = $this->statistic->total_value;
        return $total > 0 ? round(($this->value / $total) * 100, 2) : 0;
    }
}
