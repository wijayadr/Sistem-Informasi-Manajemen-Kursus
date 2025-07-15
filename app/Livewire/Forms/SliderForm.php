<?php

namespace App\Livewire\Forms;

use App\Models\Master\Slider;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Illuminate\Support\Str;

class SliderForm extends Form
{
    public ?Slider $slider = null;

    #[Rule(['required', 'string', 'max:255'])]
    public string $title = '';

    #[Rule(['nullable', 'string', 'max:255'])]
    public string $subtitle = '';

    #[Rule(['required', 'image', 'max:2048'])]
    public $image_path = '';

    #[Rule(['nullable', 'string', 'url', 'max:255'])]
    public string $link_url = '';

    #[Rule(['boolean'])]
    public bool $is_active = true;

    #[Rule(['integer', 'min:0'])]
    public int $sort_order = 0;

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image_path' => $this->slider ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'link_url' => 'nullable|string|url|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul harus diisi',
            'title.max' => 'Judul maksimal 255 karakter',
            'subtitle.max' => 'Subtitle maksimal 255 karakter',
            'image_path.required' => 'Gambar harus diupload',
            'image_path.image' => 'File harus berupa gambar',
            'image_path.max' => 'Ukuran gambar maksimal 2MB',
            'link_url.url' => 'Link URL harus valid',
            'link_url.max' => 'Link URL maksimal 255 karakter',
            'sort_order.integer' => 'Urutan harus berupa angka',
            'sort_order.min' => 'Urutan minimal 0'
        ];
    }

    public function setSlider(Slider $slider): void
    {
        $this->slider = $slider;
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->image_path = $slider->image_path;
        $this->link_url = $slider->link_url;
        $this->is_active = $slider->is_active;
        $this->sort_order = $slider->sort_order;
    }

    public function store(): void
    {
        $this->validate();

        $this->handleSortOrder();
        $this->image_path = $this->handleUploadedImage($this->image_path, $this->title);

        Slider::create($this->except('slider'));

        $this->reset();
    }

    public function update(): void
    {
        $this->validate();

        $this->handleSortOrder($this->slider->id);

        $oldImage = $this->slider->image_path;

        // Jika ada image baru yang diupload
        if ($this->image_path !== $oldImage && is_object($this->image_path)) {
            $this->image_path = $this->handleUploadedImage($this->image_path, $this->title);

            // Hapus image lama jika ada
            if ($oldImage) {
                $destinationPath = public_path('/storage/images/sliders/');
                if (file_exists($destinationPath . $oldImage)) {
                    unlink($destinationPath . $oldImage);
                }
            }
        } else {
            // Jika tidak ada image baru, gunakan image lama
            $this->image_path = $oldImage;
        }

        $this->slider->update($this->except('slider'));

        $this->reset();
    }

    private function handleSortOrder($excludeId = null): void
    {
        // Cek apakah sort_order sudah ada
        $existingSlider = Slider::where('sort_order', $this->sort_order)
            ->when($excludeId, function ($query) use ($excludeId) {
                return $query->where('id', '!=', $excludeId);
            })
            ->first();

        if ($existingSlider) {
            // Jika sort_order sudah ada, geser semua slider dengan sort_order >= sort_order yang baru
            Slider::where('sort_order', '>=', $this->sort_order)
                ->when($excludeId, function ($query) use ($excludeId) {
                    return $query->where('id', '!=', $excludeId);
                })
                ->increment('sort_order');
        }
    }

    private function handleUploadedImage($image, $title): string
    {
        if ($image && is_object($image)) {
            $imageName = time() . '-' . Str::slug($title) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images/sliders', $imageName, 'public');
            return $imageName;
        }

        return $image;
    }
}
