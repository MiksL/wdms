<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class RecentlyMovedProducts extends Component
{
    use WithPagination;
    public $searchTerm;
    public $warehouseid;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $recentlyMoved = DB::Table('shipments_to_store')->where('warehouse_id', $this->warehouseid)
        ->join('products', 'shipments_to_store.shipped_product_id', '=', 'products.id')
        ->join('stores', 'shipments_to_store.store_id', '=', 'stores.id')
        ->select(
            'shipments_to_store.id',
            'shipments_to_store.shipped_product_id',
            'shipments_to_store.store_id',
            'products.name',
            'stores.name AS store_name',
            'products.price',
            'products.weight',
            'shipments_to_store.shipped_product_count'
        )
        ->where('stores.name', 'like', $searchTerm)
        ->paginate(15);

        return view('livewire.recently-moved-products', [
            'recentlyMovedProducts' => $recentlyMoved
        ]);
    }
}
