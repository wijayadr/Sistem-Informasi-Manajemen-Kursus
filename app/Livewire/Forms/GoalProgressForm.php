<?php

namespace App\Livewire\Forms;

use App\Models\Sdgs\GoalProgress;
use Livewire\Attributes\Rule;
use Livewire\Form;

class GoalProgressForm extends Form
{
    public ?GoalProgress $progress = null;

    #[Rule(['required', 'numeric', 'min:0', 'max:100'])]
    public ?float $achievement_value = 0.0;

    #[Rule(['nullable', 'string'])]
    public ?string $notes = '';

    public function setProgress(GoalProgress $progress): void
    {
        $this->progress = $progress;
        $this->achievement_value = $progress->achievement_value;
        $this->notes = $progress->notes;
    }

    public function update(): void
    {
        $this->validate();
        $this->progress->update($this->only('achievement_value', 'notes'));
    }
}
