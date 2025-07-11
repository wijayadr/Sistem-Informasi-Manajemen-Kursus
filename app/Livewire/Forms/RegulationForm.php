<?php

namespace App\Livewire\Forms;

use App\Models\Regulation\Regulation;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Str;

class RegulationForm extends Form
{
    public ?Regulation $regulation = null;

    #[Rule('required')]
    public $regulation_category_id = null;

    #[Rule(['required', 'string', 'max:100'])]
    public ?string $title = null;

    #[Rule(['required', 'string'])]
    public ?string $document_type = null;

    #[Rule(['required'])]
    public $document_value = null;

    #[Rule(['required', 'string'])]
    public ?string $description = null;

     public function setRegulation(Regulation $regulation): void
    {
        $this->regulation = $regulation;
        $this->regulation_category_id = $regulation->regulation_category_id;
        $this->title = $regulation->title;
        $this->document_type = $regulation->document_type;
        $this->document_value = $regulation->document_value;
        $this->description = $regulation->description;
    }

    public function store(): void
    {
        $this->validate();

        if ($this->document_type === 'file') {
            $this->document_value = $this->handleUploadedImage($this->document_value, $this->title);
        }

        Regulation::create($this->except('regulation'));

        $this->reset();
    }

     public function update(): void
    {
        $this->validate();

        if ($this->document_type === 'file') {
            $this->document_value = $this->document_value !== $this->regulation->document_value ? $this->handleUploadedImage($this->document_value, $this->title) : $this->regulation->document_value;
        }

        $this->regulation->update($this->except('regulation'));

        $this->reset();
    }

    public function handleUploadedImage($image, $name): string
    {
        if ($image) {
            $image = $image;
            $imageName = time() . '-' . Str::slug($name) . '.' . $image->getClientOriginalExtension();

            $image->storeAs('files/regulations', $imageName, 'public');
            return $imageName;
        }
    }
}
