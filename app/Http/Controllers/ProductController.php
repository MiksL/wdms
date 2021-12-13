<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        return view('products');
    }

    public function create()
    {
        if(Auth::user()->is_admin == 1)
        {
            return view('products.add-product');
        }
        else
        {
            return abort(403);
        }
    }

    public function store(Request $request)
    {
        $newProduct = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'size' => $request->size,
            'weight' => $request->weight
        ]);
        return view('products');
    }

    public function edit()
    {
        return view('products.edit');
    }

    public function update(Product $product, Request $request)
    {
        if(Auth::user()->is_product_manager == 1)
        {
            $product->where('id', $request->id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'size' => $request->size,
                'weight' => $request->weight
            ]);
        }
    }
}
?>