<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class StoreProductStock extends Component
{
    use WithPagination;
    public $searchTerm;
    public $storeid;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $currentStock = DB::Table('store_stock')->where('store_id', $this->storeid)
        ->join('products', 'store_stock.product_id', '=', 'products.id')
        ->where('name', 'like', $searchTerm)
        ->paginate(15);

        return view('livewire.store-product-stock', [
            'storeStock' => $currentStock
        ]);
    }
}
