<?php

namespace App\Livewire\Forms;

use App\Models\Master\Event;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Str;

class EventForm extends Form
{
    public ?Event $event = null;

    #[Rule('required')]
    public string $name = '';

    #[Rule('nullable')]
    public string $slug = '';

    #[Rule('required')]
    public string $description = '';

    #[Rule('required')]
    public $start_time;

    #[Rule('nullable')]
    public $end_time;

    #[Rule('nullable')]
    public string $location = '';

    #[Rule('nullable')]
    public $image = '';

    #[Rule('nullable')]
    public ?int $created_by = null;

    public function setEvent(Event $event): void
    {
        $this->event = $event;
        $this->name = $event->name;
        $this->slug = $event->slug;
        $this->description = $event->description;
        $this->start_time = $event->start_time;
        $this->end_time = $event->end_time;
        $this->location = $event->location;
        $this->image = $event->image;
        $this->created_by = $event->created_by;
    }

    public function store(): void
    {
        $this->validate();

        $this->image = $this->image ? $this->handleUploadedImage($this->image, $this->name) : 'default.jpg';
        $this->slug = Str::slug($this->name);
        $this->created_by = auth()->user()->id;

        Event::create($this->except('event'));

        $this->reset();
    }

    public function update(): void
    {
        $this->validate();

        $this->image = $this->image !== $this->event->image ? $this->handleUploadedImage($this->image, $this->name) : $this->event->image;
        $this->slug = Str::slug($this->name);

        $this->event->update($this->except('event'));

        $this->reset();
    }

    public function handleUploadedImage($image, $name): string
    {
        if ($image) {
            $image = $image;
            $imageName = time() . '-' . Str::slug($name) . '.' . $image->getClientOriginalExtension();

            $image->storeAs('images/events', $imageName, 'public');
            return $imageName;
        }
    }
}
