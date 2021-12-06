<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        return view('products');
    }

    public function create()
    {
        return view('products.add-product');
    }

    public function store()
    {
        return view('products.store');
    }

    public function edit()
    {
        return view('products.edit');
    }

    public function update()
    {
        return view('products.update');
    }
}
?>