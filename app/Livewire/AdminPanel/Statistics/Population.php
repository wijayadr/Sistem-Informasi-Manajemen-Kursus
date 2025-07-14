<?php

namespace App\Livewire\AdminPanel\Statistics;

use App\Livewire\Forms\PopulationForm;
use App\Models\Statistic\Population as ModelPopulation;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Statistik Penduduk')]
class Population extends Component
{
    public ModelPopulation $population;
    public PopulationForm $form;

    public function mount()
    {
        $this->population = ModelPopulation::first();
        $this->form->setPopulation($this->population);
    }

    public function edit(): void
    {
        if ($this->population->exists) {
            $this->form->update();
        } else {
            $this->form->store();
        }

        $this->resetValidation();
        $this->showToastr('success', 'Data Statistik Populasi berhasil diubah');
    }

    public function render()
    {
        return view('livewire.admin-panel.statistics.population');
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
}
