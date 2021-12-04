<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Warehouse;

class WarehouseSearch extends Component
{
    use WithPagination;
    public $searchTerm;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $warehouses = Warehouse::where('name', 'like', $searchTerm)->paginate(10);
        return view('livewire.warehouse-search', [
            'warehouses' => $warehouses,
        ]);
    }
}
