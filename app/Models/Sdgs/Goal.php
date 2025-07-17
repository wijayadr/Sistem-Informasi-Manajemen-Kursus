<?php

namespace App\Models\Sdgs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Goal extends Model
{
    use HasFactory;

     protected $table = 'sdgs_goals';

    protected $fillable = [
        'number',
        'title',
        'image_url',
        'description',
    ];

    protected $casts = [
        'number' => 'integer',
    ];

    public function progress(): HasOne
    {
        return $this->hasOne(GoalProgress::class, 'goal_id');
    }

    public static function averageAchievementValue(): float
    {
        return round(GoalProgress::avg('achievement_value') ?? 0, 2);
    }
}
