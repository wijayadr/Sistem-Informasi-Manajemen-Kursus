<?php

namespace App\Models\Statistic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'year',
        'chart_type',
        'description',
        'is_active',
    ];

    protected $casts = [
        'year' => 'integer',
        'is_active' => 'boolean',
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByYear($query, $year)
    {
        return $query->where('year', $year);
    }

    public function getTotalValueAttribute()
    {
        return $this->categories->sum('value');
    }

    public function getChartDataAttribute()
    {
        return $this->categories->map(function ($category) {
            return [
                'label' => $category->category,
                'value' => $category->value,
                'color' => $category->color,
            ];
        });
    }
}
