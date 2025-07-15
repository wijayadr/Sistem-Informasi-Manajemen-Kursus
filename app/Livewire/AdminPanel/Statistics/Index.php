<?php

namespace App\Livewire\AdminPanel\Statistics;

use App\Livewire\Forms\StatisticForm;
use App\Models\Statistic\Statistic;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Statistik Data')]
class Index extends Component
{
    use WithPagination;

    public StatisticForm $form;
    public $showModal = false;
    public $editMode = false;
    public $search = '';
    public $filterType = '';
    public $filterYear = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'filterType' => ['except' => ''],
        'filterYear' => ['except' => ''],
    ];

    public function mount()
    {
        $this->form->year = now()->year;
    }

    public function render()
    {
        $statistics = Statistic::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('type', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterType, function ($query) {
                $query->where('type', $this->filterType);
            })
            ->when($this->filterYear, function ($query) {
                $query->where('year', $this->filterYear);
            })
            ->with('categories')
            ->latest()
            ->paginate(10);

        $types = Statistic::distinct()->pluck('type');
        $years = Statistic::distinct()->pluck('year')->filter()->sort();

        return view('livewire.admin-panel.statistics.index', [
            'statistics' => $statistics,
            'types' => $types,
            'years' => $years,
        ]);
    }

    public function create()
    {
        $this->form->reset();
        $this->form->year = now()->year;
        $this->form->categories = [
            ['category' => '', 'value' => 0, 'color' => '#10B981']
        ];
        $this->editMode = false;
        $this->showModal = true;
    }

    public function edit(Statistic $statistic)
    {
        $this->form->setStatistic($statistic);
        $this->editMode = true;
        $this->showModal = true;
    }

    public function save()
    {
        try {
            if ($this->editMode) {
                $this->form->update();
                $this->showToastr('success', 'Statistik berhasil diperbarui');
            } else {
                $this->form->store();
                $this->showToastr('success', 'Statistik berhasil ditambahkan');
            }

            $this->showModal = false;
            $this->resetValidation();
        } catch (\Exception $e) {
            $this->showToastr('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function delete(Statistic $statistic)
    {
        $this->deleteConfirm('confirmDelete', $statistic->id);
    }

    public function confirmDelete($id)
    {
        $statistic = Statistic::find($id);
        if ($statistic) {
            $statistic->delete();
            $this->showToastr('success', 'Statistik berhasil dihapus');
        }
    }

    public function toggleActive(Statistic $statistic)
    {
        $statistic->update(['is_active' => !$statistic->is_active]);
        $this->showToastr('success', 'Status statistik berhasil diubah');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetValidation();
    }

    public function addCategory()
    {
        $this->form->addCategory();
    }

    public function removeCategory($index)
    {
        $this->form->removeCategory($index);
    }

    public function resetFilters()
    {
        $this->reset(['search', 'filterType', 'filterYear']);
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
