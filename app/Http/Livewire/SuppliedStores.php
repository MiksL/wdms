<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Warehouse;

class SuppliedStores extends Component
{
    use WithPagination;
    public $searchTerm;
    public $warehouseid;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $suppliedStores = Warehouse::find($this->warehouseid)->stores()
        ->where('name', 'like', $searchTerm)
        ->paginate(10);

        return view('livewire.supplied-stores', [
            'stores' => $suppliedStores,
        ]);
    }
}
