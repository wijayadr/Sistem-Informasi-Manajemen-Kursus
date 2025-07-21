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
        'chart_options'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'chart_options' => 'array',
        'year' => 'integer',
    ];

    // Relationships
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('name');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Attributes
    public function getTotalValueAttribute()
    {
        return $this->categories->sum('value');
    }

    public function getChartDataAttribute()
    {
        return [
            'labels' => $this->categories->pluck('category'),
            'data' => $this->categories->pluck('value'),
            'colors' => $this->categories->pluck('color'),
        ];
    }

    public function getChartConfigAttribute()
    {
        $baseConfig = [
            'type' => $this->chart_type,
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'position' => in_array($this->chart_type, ['pie', 'doughnut']) ? 'bottom' : 'top'
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => 'function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const value = context.raw || context.parsed.y;
                            const percentage = ((value / total) * 100).toFixed(2);
                            return context.label + ": " + value.toLocaleString() + " (" + percentage + "%)";
                        }'
                    ]
                ]
            ]
        ];

        // Add scales for bar and line charts
        if (in_array($this->chart_type, ['bar', 'line'])) {
            $baseConfig['scales'] = [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'callback' => 'function(value) { return value.toLocaleString(); }'
                    ]
                ],
                'x' => [
                    'ticks' => [
                        'maxRotation' => 45,
                        'minRotation' => 45
                    ]
                ]
            ];
        }

        // Merge with custom chart options
        if ($this->chart_options) {
            $baseConfig = array_merge_recursive($baseConfig, $this->chart_options);
        }

        return $baseConfig;
    }

    // Static methods for common chart colors
    public static function getDefaultColors(): array
    {
        return [
            '#10B981', '#3B82F6', '#8B5CF6', '#F59E0B', '#EF4444',
            '#06B6D4', '#84CC16', '#F97316', '#EC4899', '#6B7280'
        ];
    }

    public static function assignColorsToCategories(array $categories): array
    {
        $colors = self::getDefaultColors();

        return array_map(function ($category, $index) use ($colors) {
            return array_merge($category, [
                'color' => $colors[$index % count($colors)]
            ]);
        }, $categories, array_keys($categories));
    }
}
