<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    public $modelClass;
    public $items = [];
    public $selectedItems = [];
    public $perPage = 10;
    public $search = '';
    public $imageColumn = '';
    public $actionButtons = [];

    public function mount($modelClass, $imageColumn = null, $actionButtons = [])
    {
        $this->modelClass = $modelClass;
        $this->imageColumn = $imageColumn;
        $this->actionButtons = $actionButtons;
        $this->loadItems();
    }

    public function loadItems()
    {
        $model = $this->modelClass;

        $query = $model::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%'); // Simple search by 'name'
        }

        $this->items = $query->paginate($this->perPage);
    }

    public function toggleSelectAll()
    {
        if (count($this->selectedItems) === $this->items->count()) {
            $this->selectedItems = [];
        } else {
            $this->selectedItems = $this->items->pluck('id')->toArray();
        }
    }

    public function updatedSearch()
    {
        $this->loadItems();
    }

    public function deleteSelected()
    {
        $model = $this->modelClass;

        DB::transaction(function () use ($model) {
            foreach ($this->selectedItems as $itemId) {
                $item = $model::find($itemId);
                if ($item) {
                    $item->delete();
                }
            }
        });

        $this->selectedItems = [];
        $this->loadItems(); // Reload the data after deletion
        session()->flash('message', 'Selected items deleted successfully!');
    }

    public function render()
    {
        return view('livewire.components.data-table');
    }
}
