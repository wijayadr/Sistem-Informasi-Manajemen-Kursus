<?php

namespace App\Livewire\AdminPanel\Administrations\Regulations;

use App\Livewire\Forms\RegulationForm;
use App\Models\Regulation\Category as RegulationCategory;
use App\Models\Regulation\Regulation;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Title('Data Regulasi')]
class Index extends Component
{
    use WithPagination, WithFileUploads;

    public bool $showModal = false;
    public string $mode;
    public int $id;

    public RegulationForm $form;

    public array $listsForFields = [];

    #[Url()]
    public string $search = '';

    public function mount(): void
    {
        $this->initListsForFields();
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['categories'] = RegulationCategory::pluck('name', 'id');
        $this->listsForFields['document_types'] = [
            'file' => 'File',
            'url' => 'URL',
        ];
    }

    public function openModal(): void
    {
        $this->showModal = true;
        $this->mode = 'add';
        $this->form->reset();
    }

    public function save(): void
    {
        $this->form->store();

        $this->showModal = false;
        $this->resetValidation();
        $this->showToastr('success', 'Data regulasi berhasil ditambahkan');
        $this->dispatch('closeModal');
    }

    public function edit($id): void
    {
        $regulation = Regulation::find($id);
        $this->id = $regulation->id;
        $this->form->setRegulation($regulation);
        $this->showModal = true;
        $this->mode = 'edit';
    }

    public function update(): void
    {
        $this->form->update();

        $this->showModal = false;
        $this->resetValidation();
        $this->showToastr('success', 'Data regulasi berhasil diubah');
        $this->dispatch('closeModal');
    }

    public function cancelEdit(): void
    {
        $this->resetValidation();
        $this->form->reset();
    }

    #[On('delete')]
    public function delete($id): void
    {
        $regulation = Regulation::find($id);

        // Hapus file jika ada
        if ($regulation->document_type === 'file' && $regulation->document_value) {
            $filePath = storage_path('app/public/files/regulations/' . $regulation->document_value);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $regulation->delete();
        $this->showToastr('success', 'Data regulasi berhasil dihapus');
    }

    public function render(): View
    {
        $regulations = Regulation::with('category')
            ->when($this->search, fn ($query) => $query->where('title', 'like', '%' . $this->search . '%'))
            ->paginate(10);

        return view('livewire.admin-panel.administrations.regulations.index', compact('regulations'));
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
