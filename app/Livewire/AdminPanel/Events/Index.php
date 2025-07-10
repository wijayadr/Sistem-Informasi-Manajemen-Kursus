<?php

namespace App\Livewire\AdminPanel\Events;

use App\Models\Master\Event;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('Agenda')]
class Index extends Component
{
    #[Url()]
    public string $search = '';

    #[On('delete')]
    public function delete($id): void
    {
        Event::findOrFail($id)->delete();

        $this->showToastr('success', 'Data berhasil dihapus');
    }

    public function render(): View
    {
        $events = Event::when($this->search, fn ($event) => $event->where('name', 'like', '%' . $this->search . '%'))->paginate(10);

        return view('livewire.admin-panel.events.index', compact('events'));
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
