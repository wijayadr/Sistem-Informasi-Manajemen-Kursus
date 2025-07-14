<?php

namespace App\Livewire\AdminPanel\Statistics;

use App\Livewire\Forms\ReligionForm;
use App\Models\Statistic\Religion as ModelReligion;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Statistik Agama')]
class Religion extends Component
{
    public ModelReligion $religion;
    public ReligionForm $form;

    public function mount()
    {
        $this->religion = ModelReligion::first();
        $this->form->setReligion($this->religion);
    }

    public function edit(): void
    {
        $this->form->update();
        $this->resetValidation();
        $this->showToastr('success', 'Data Statistik Agama berhasil diubah');
    }

    public function render()
    {
        return view('livewire.admin-panel.statistics.religion');
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
