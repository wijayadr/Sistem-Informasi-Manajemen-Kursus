<?php

namespace App\Models\Statistic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    protected $table = 'population_statistics';

    protected $fillable = [
        'total_population',
        'head_of_family',
        'male',
        'female',
        'temporary_residents',
        'population_mutation',
        'unmarried',
        'married',
        'divorced_alive',
        'divorced_dead',
    ];

    protected $casts = [
        'total_population' => 'integer',
        'head_of_family' => 'integer',
        'male' => 'integer',
        'female' => 'integer',
        'temporary_residents' => 'integer',
        'population_mutation' => 'integer',
        'unmarried' => 'integer',
        'married' => 'integer',
        'divorced_alive' => 'integer',
        'divorced_dead' => 'integer',
    ];
}
