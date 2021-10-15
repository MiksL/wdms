<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function products()
    {
        $products = DB::table('products')->get();
        return view('products', [
            'products' => $products
        ]);
    }
}
?>