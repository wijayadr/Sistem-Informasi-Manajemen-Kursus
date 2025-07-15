<?php

namespace App\Livewire\AdminPanel\Statistics;

use App\Models\Statistic\Statistic;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Statistik')]
class Edit extends Component
{
    public Statistic $statistic;
    public $categories = [];

    public function mount(Statistic $statistic)
    {
        $this->statistic = $statistic;
        $this->loadCategories();
    }

    public function loadCategories()
    {
        $this->categories = $this->statistic->categories()->get()->map(function ($category) {
            return [
                'id' => $category->id,
                'category' => $category->category,
                'value' => $category->value,
                'color' => $category->color ?? '#10B981',
            ];
        })->toArray();

        $this->dispatch('refresh');
    }

    public function updatedCategories()
    {
        // Dipanggil setiap kali categories berubah
        $this->dispatch('refresh');
    }

    public function updateCategory($index, $field, $value)
    {
        $this->categories[$index][$field] = $value;
        $this->dispatch('refresh');
    }

    public function save()
    {
        $this->validate([
            'categories.*.category' => 'required|string|max:255',
            'categories.*.value' => 'required|integer|min:0',
            'categories.*.color' => 'nullable|string|max:7',
        ]);

        try {
            foreach ($this->categories as $categoryData) {
                $this->statistic->categories()->updateOrCreate(
                    ['id' => $categoryData['id']],
                    [
                        'category' => $categoryData['category'],
                        'value' => $categoryData['value'],
                        'color' => $categoryData['color'],
                    ]
                );
            }

            $this->showToastr('success', 'Data statistik berhasil diperbarui');
            $this->loadCategories(); // Refresh data
            $this->dispatch('refresh');
        } catch (\Exception $e) {
            $this->showToastr('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin-panel.statistics.edit');
    }

    public function showToastr($type, $message): void
    {
        $this->dispatch('show:toastify', type: $type, message: $message);
    }
}
