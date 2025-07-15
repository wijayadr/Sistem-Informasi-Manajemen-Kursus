<?php

namespace App\Livewire\Forms;

use App\Models\Statistic\Statistic;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StatisticForm extends Form
{
    public ?Statistic $statistic = null;

    #[Validate('required|string|max:255')]
    public $type = '';

    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('nullable|integer|min:2000|max:2100')]
    public $year = null;

    #[Validate('required|string|in:bar,pie,line,doughnut')]
    public $chart_type = 'bar';

    #[Validate('nullable|string|max:1000')]
    public $description = '';

    #[Validate('boolean')]
    public $is_active = true;

    public $categories = [];

    public function rules()
    {
        return [
            'type' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'year' => 'nullable|integer|min:2000|max:2100',
            'chart_type' => 'required|string|in:bar,pie,line,doughnut',
            'description' => 'nullable|string|max:1000',
            'is_active' => 'boolean',
            'categories' => 'required|array|min:1',
            'categories.*.category' => 'required|string|max:255',
            'categories.*.value' => 'required|integer|min:0',
            'categories.*.color' => 'nullable|string|max:7',
        ];
    }

    public function setStatistic(Statistic $statistic): void
    {
        $this->statistic = $statistic;
        $this->type = $statistic->type;
        $this->name = $statistic->name;
        $this->year = $statistic->year;
        $this->chart_type = $statistic->chart_type;
        $this->description = $statistic->description;
        $this->is_active = $statistic->is_active;

        $this->categories = $statistic->categories->map(function ($category) {
            return [
                'id' => $category->id,
                'category' => $category->category,
                'value' => $category->value,
                'color' => $category->color,
            ];
        })->toArray();
    }

    public function store(): void
    {
        $this->validate();

        $statistic = Statistic::create($this->only([
            'type',
            'name',
            'year',
            'chart_type',
            'description',
            'is_active',
        ]));

        foreach ($this->categories as $categoryData) {
            $statistic->categories()->create([
                'category' => $categoryData['category'],
                'value' => $categoryData['value'],
                'color' => $categoryData['color'] ?? null,
            ]);
        }

        $this->reset();
    }

    public function update(): void
    {
        $this->validate();

        $this->statistic->update($this->only([
            'type',
            'name',
            'year',
            'chart_type',
            'description',
            'is_active',
        ]));

        // Update categories
        $this->statistic->categories()->delete();

        foreach ($this->categories as $categoryData) {
            $this->statistic->categories()->create([
                'category' => $categoryData['category'],
                'value' => $categoryData['value'],
                'color' => $categoryData['color'] ?? null,
            ]);
        }
    }

    public function addCategory(): void
    {
        $this->categories[] = [
            'category' => '',
            'value' => 0,
            'color' => '#' . substr(md5(rand()), 0, 6),
        ];
    }

    public function removeCategory($index): void
    {
        unset($this->categories[$index]);
        $this->categories = array_values($this->categories);
    }
}
