<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductSearch extends Component
{
    use WithPagination;
    public $searchTerm;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $products = Product::where('name', 'like', $searchTerm)
        ->orWhere('id', 'like', $searchTerm)
        ->paginate(15);
        return view('livewire.product-search', [
            'products' => $products,
        ]);
    }
}
