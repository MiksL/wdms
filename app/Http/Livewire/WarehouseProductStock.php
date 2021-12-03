<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class WarehouseProductStock extends Component
{
    use WithPagination;
    public $searchTerm;
    public $warehouseid;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $currentStock = DB::Table('warehouse_stock')->where('warehouse_id', $this->warehouseid)
        ->join('products', 'warehouse_stock.product_id', '=', 'products.id')
        ->where('name', 'like', $searchTerm)
        ->paginate(15);

        return view('livewire.warehouse-product-stock', [
            'warehouseStock' => $currentStock
        ]);
    }
}
