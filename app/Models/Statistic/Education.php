<?php

namespace App\Models\Statistic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'education_statistics';

    protected $fillable = [
        'no_school',
        'not_finished_primary',
        'primary_graduate',
        'junior_secondary',
        'senior_secondary',
        'diploma_i_ii',
        'diploma_iii',
        'bachelor',
        'master',
        'doctorate',
    ];

    protected $casts = [
        'no_school' => 'integer',
        'not_finished_primary' => 'integer',
        'primary_graduate' => 'integer',
        'junior_secondary' => 'integer',
        'senior_secondary' => 'integer',
        'diploma_i_ii' => 'integer',
        'diploma_iii' => 'integer',
        'bachelor' => 'integer',
        'master' => 'integer',
        'doctorate' => 'integer',
    ];

    /**
     * Get total education statistics
     */
    public function getTotalAttribute(): int
    {
        return $this->no_school +
               $this->not_finished_primary +
               $this->primary_graduate +
               $this->junior_secondary +
               $this->senior_secondary +
               $this->diploma_i_ii +
               $this->diploma_iii +
               $this->bachelor +
               $this->master +
               $this->doctorate;
    }
}
