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
        // Add PRODUCT model
        $products = DB::table('products')->paginate(15);
        return view('products', [
            'products' => $products,
        ]);
    }
}
?>