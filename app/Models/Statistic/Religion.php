<?php

namespace App\Models\Statistic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use HasFactory;

     protected $table = 'religion_statistics';

    protected $fillable = [
        'islam',
        'christian',
        'catholic',
        'hindu',
        'buddhist',
        'confucian',
        'others',
    ];

    protected $casts = [
        'islam' => 'integer',
        'christian' => 'integer',
        'catholic' => 'integer',
        'hindu' => 'integer',
        'buddhist' => 'integer',
        'confucian' => 'integer',
        'others' => 'integer',
    ];

    /**
     * Get total population by religion
     */
    public function getTotalAttribute()
    {
        return $this->islam + $this->christian + $this->catholic +
               $this->hindu + $this->buddhist + $this->confucian + $this->others;
    }

    /**
     * Get percentage for each religion
     */
    public function getPercentage($religion)
    {
        $total = $this->total;
        if ($total == 0) return 0;

        return round(($this->$religion / $total) * 100, 2);
    }
}
