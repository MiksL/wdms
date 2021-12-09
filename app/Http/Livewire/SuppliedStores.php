<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Store;

class SuppliedStores extends Component
{
    use WithPagination;
    public $searchTerm;
    public $warehouseid;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $suppliedStores = Store::where('supplying_warehouse_id', $this->warehouseid)
        ->where('name', 'like', $searchTerm)->paginate(10);

        return view('livewire.supplied-stores', [
            'stores' => $suppliedStores,
        ]);
    }
}
