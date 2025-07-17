<?php

namespace App\Livewire\AdminPanel\IdmScores;

use App\Models\Master\IdmScore;
use App\Models\Master\Village;
use App\Livewire\Forms\IdmScoreForm;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Title('IDM Scores')]
class Index extends Component
{
    use WithPagination;

    public IdmScoreForm $form;
    public bool $showModal = false;
    public string $mode;
    public int $id;

    #[Url()]
    public string $search = '';

    #[Url()]
    public string $yearFilter = '';

    #[Url()]
    public string $statusFilter = '';

    public function openModal(): void
    {
        $this->showModal = true;
        $this->mode = 'add';
        $this->form->reset();
    }

    public function save(): void
    {
        try {
            $this->form->store();
            $this->showModal = false;
            $this->resetValidation();
            $this->showToastr('success', 'Data IDM Score berhasil ditambahkan');
            $this->dispatch('closeModal');
        } catch (\Exception $e) {
            $this->showToastr('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id): void
    {
        $idmScore = IdmScore::find($id);
        $this->id = $idmScore->id;
        $this->form->setIdmScore($idmScore);
        $this->showModal = true;
        $this->mode = 'edit';
    }

    public function update(): void
    {
        try {
            $this->form->update();
            $this->showModal = false;
            $this->resetValidation();
            $this->showToastr('success', 'Data IDM Score berhasil diubah');
            $this->dispatch('closeModal');
        } catch (\Exception $e) {
            $this->showToastr('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function cancelEdit(): void
    {
        $this->resetValidation();
        $this->form->reset();
    }

    #[On('delete')]
    public function delete($id): void
    {
        IdmScore::find($id)->delete();
        $this->showToastr('success', 'Data IDM Score berhasil dihapus');
    }

    public function clearFilters(): void
    {
        $this->search = '';
        $this->yearFilter = '';
        $this->statusFilter = '';
    }

    public function updatedFormIks(): void
    {
        $this->form->calculateIdmScore();
    }

    public function updatedFormIke(): void
    {
        $this->form->calculateIdmScore();
    }

    public function updatedFormIkl(): void
    {
        $this->form->calculateIdmScore();
    }

    public function render(): View
    {
        $idmScores = IdmScore::when($this->search, function ($query) {
                $query->whereHas('village', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->yearFilter, fn ($query) => $query->where('year', $this->yearFilter))
            ->when($this->statusFilter, fn ($query) => $query->where('idm_status', $this->statusFilter))
            ->latest('year')
            ->paginate(10);

        $years = range(date('Y'), 2020);
        $statuses = IdmScore::getStatusOptions();

        return view('livewire.admin-panel.idm-scores.index', compact('idmScores', 'years', 'statuses'));
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
