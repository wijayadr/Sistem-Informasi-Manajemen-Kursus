<?php

namespace App\Models\Sdgs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GoalProgress extends Model
{
    use HasFactory;

    protected $table = 'sdgs_goal_progress';

    protected $fillable = [
        'goal_id',
        'achievement_value',
        'notes',
    ];

    protected $casts = [
        'achievement_value' => 'decimal:2',
    ];

    public function goal(): BelongsTo
    {
        return $this->belongsTo(Goal::class, 'goal_id');
    }
}
