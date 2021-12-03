<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Store;

class StoreSearch extends Component
{
    use WithPagination;
    public $searchTerm;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $stores = Store::where('stores.name', 'like', $searchTerm)
        ->join('warehouses', 'warehouses.id', '=', 'stores.supplying_warehouse_id')
        ->select(
            'stores.id',
            'stores.name',
            'stores.location',
            'warehouses.name AS supplying_warehouse'
        )
        ->paginate(15);
        return view('livewire.store-search', [
            'stores' => $stores
        ]);
    }
}
