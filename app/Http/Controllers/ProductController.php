<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function products(Product $product)
    {
        // Add PRODUCT model
        $products = $product->sortable()->paginate(15);
        return view('products', [
            'products' => $products,
        ]);
    }
}
?>