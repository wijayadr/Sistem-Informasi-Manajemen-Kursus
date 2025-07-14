<?php

namespace App\Livewire\AdminPanel\Statistics;

use App\Livewire\Forms\EducationForm;
use App\Models\Statistic\Education as ModelEducation;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Statistik Pendidikan')]
class Education extends Component
{
    public ModelEducation $education;
    public EducationForm $form;

    public function mount()
    {
        $this->education = ModelEducation::first();
        $this->form->setEducation($this->education);
    }

    public function edit(): void
    {
        if ($this->education->exists) {
            $this->form->update();
        } else {
            $this->form->store();
        }

        $this->resetValidation();
        $this->showToastr('success', 'Data Statistik Pendidikan berhasil diubah');
    }

    public function render()
    {
        return view('livewire.admin-panel.statistics.education');
    }

    public function showToastr($type, $message): void
    {
        $this->dispatch('show:toastify', type: $type, message: $message);
    }

    public function deleteConfirm($method, $params = null): void
    {
        $this->dispatch('swal:confirm',
            title: 'Apakah anda yakin?',
            text: 'Data yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Batal',
            method: $method,
            params: $params,
            callback: ''
        );
    }

    /**
     * Get total education statistics
     */
    public function getTotal(): int
    {
        return $this->form->getTotal();
    }
}
