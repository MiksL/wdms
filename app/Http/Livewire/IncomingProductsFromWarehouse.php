<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class IncomingProductsFromWarehouse extends Component
{
    use WithPagination;
    public $searchTerm;
    public $storeid;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $incomingShipmentsFromWarehouse = DB::Table('shipments_to_store')->where('store_id', $this->storeid)
        ->join('products', 'shipments_to_store.shipped_product_id', '=', 'products.id')
        ->select(
            'shipments_to_store.id',
            'shipments_to_store.shipped_product_id',
            'shipments_to_store.store_id',
            'products.name',
            'products.price',
            'products.weight',
            'shipments_to_store.shipped_product_count'
        )
        ->where('products.name', 'like', $searchTerm)
        ->orWhere('products.id', 'like', $searchTerm)
        ->paginate(15);

        return view('livewire.incoming-products-from-warehouse', [
            'recentlyMovedProducts' => $incomingShipmentsFromWarehouse
        ]);
    }
}
