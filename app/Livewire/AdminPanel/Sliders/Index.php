<?php

namespace App\Livewire\AdminPanel\Sliders;

use App\Livewire\Forms\SliderForm;
use App\Models\Master\Slider;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

#[Title('Slider')]
class Index extends Component
{
    use WithPagination, WithFileUploads;

    public bool $showModal = false;
    public string $mode = 'add';
    public int $id = 0;

    public SliderForm $form;

    #[Url()]
    public string $search = '';

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
            $this->showToastr('success', 'Data berhasil ditambahkan');
            $this->dispatch('closeModal');
        } catch (\Exception $e) {
            $this->showToastr('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id): void
    {
        $slider = Slider::find($id);
        $this->id = $slider->id;
        $this->form->setSlider($slider);
        $this->showModal = true;
        $this->mode = 'edit';
    }

    public function update(): void
    {
        try {
            $this->form->update();
            $this->showModal = false;
            $this->resetValidation();
            $this->showToastr('success', 'Data berhasil diubah');
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
        $slider = Slider::find($id);
        $deletedSortOrder = $slider->sort_order;

        // Hapus image dari storage jika ada
        if ($slider->image_path) {
            $destinationPath = public_path('/storage/images/sliders/');
            if (file_exists($destinationPath . $slider->image_path)) {
                unlink($destinationPath . $slider->image_path);
            }
        }

        $slider->delete();

        // Reorder sort_order setelah delete
        Slider::where('sort_order', '>', $deletedSortOrder)
            ->decrement('sort_order');

        $this->showToastr('success', 'Data berhasil dihapus');
    }

    public function reorderSliders(): void
    {
        $sliders = Slider::orderBy('sort_order')->get();

        foreach ($sliders as $index => $slider) {
            $slider->update(['sort_order' => $index + 1]);
        }

        $this->showToastr('success', 'Urutan slider berhasil diperbarui');
    }

    public function toggleActive($id): void
    {
        $slider = Slider::find($id);
        $slider->update(['is_active' => !$slider->is_active]);

        $status = $slider->is_active ? 'diaktifkan' : 'dinonaktifkan';
        $this->showToastr('success', "Slider berhasil {$status}");
    }

    public function render(): View
    {
        $sliders = Slider::when($this->search, function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('subtitle', 'like', '%' . $this->search . '%');
        })
        ->orderBy('sort_order')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('livewire.admin-panel.sliders.index', compact('sliders'));
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
