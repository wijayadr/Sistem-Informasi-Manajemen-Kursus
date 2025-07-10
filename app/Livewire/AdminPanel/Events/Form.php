<?php

namespace App\Livewire\AdminPanel\Events;

use App\Livewire\Forms\EventForm;
use App\Models\Master\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;
    public Event $event;
    public bool $editing = false;
    public EventForm $form;

    public function mount(Event $event): void
    {
        if($event->exists) {
            $this->editing = true;
            $this->form->setEvent($event);
        }
    }

    public function save(): RedirectResponse|Redirector
    {
        $this->form->store();

        session()->flash('success', 'Data Agenda Kegiatan berhasil disimpan');

        return redirect()->route('admin.events.index');
    }

    public function edit(): RedirectResponse|Redirector
    {
        $this->form->update();

        session()->flash('success', 'Data Agenda Kegiatan berhasil diubah');

        return redirect()->route('admin.events.index');
    }

    public function render(): View
    {
        $title = $this->editing ? 'Edit Data Agenda Kegiatan' : 'Tambah Data Agenda Kegiatan';

        return view('livewire.admin-panel.events.form')->title($title);
    }
}
