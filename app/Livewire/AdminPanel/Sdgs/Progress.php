<?php

namespace App\Livewire\AdminPanel\Sdgs;

use App\Livewire\Forms\GoalProgressForm;
use App\Models\Sdgs\Goal;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Progress SDGs')]
class Progress extends Component
{
    public $goals;
    public float $average = 0;
    public GoalProgressForm $form;

    public function mount()
    {
        $this->goals = Goal::with('progress')->get();
        $this->average = Goal::averageAchievementValue();
    }

    public function updateProgress($goalId, $value)
    {
        $goal = $this->goals->find($goalId);
        $this->form->setProgress($goal->progress);
        $this->form->achievement_value = $value;
        $this->form->update();

        $this->average = Goal::averageAchievementValue();

        $this->showToastr('success', 'Progress berhasil diperbarui');
    }

    public function updateNotes($goalId, $notes)
    {
        $goal = $this->goals->find($goalId);
        $this->form->setProgress($goal->progress);
        $this->form->notes = $notes;
        $this->form->update();

        $this->average = Goal::averageAchievementValue();

        $this->showToastr('success', 'Catatan berhasil diperbarui');
    }


    public function showToastr($type, $message): void
    {
        $this->dispatch('show:toastify', type: $type, message: $message);
    }

    public function render()
    {
        return view('livewire.admin-panel.sdgs.progress');
    }
}
