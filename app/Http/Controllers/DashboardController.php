<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $bestSellingProducts = DB::table('shipments_to_store')
        ->select('products.name',DB::raw('SUM(shipments_to_store.shipped_product_count) AS shipped_products'),'shipments_to_store.shipped_product_id')
        ->join('products','shipments_to_store.shipped_product_id','=','products.id')
        ->groupBy('shipped_product_id','products.name')
        ->orderByRaw('shipped_products DESC')
        ->limit(5)
        ->get();

        $recentlyMovedProducts = DB::Table('shipments_to_store')
        ->join('products', 'shipments_to_store.shipped_product_id', '=', 'products.id')
        ->join('stores', 'shipments_to_store.store_id', '=', 'stores.id')
        ->join('warehouses', 'shipments_to_store.warehouse_id', '=', 'warehouses.id')
        ->orderBy('shipments_to_store.id', 'desc')
        ->take(6)
        ->select(
            'warehouses.name AS warehouse_name',
            'products.name AS product_name',
            'stores.name AS destination_store',
            'shipments_to_store.shipped_product_count AS amount'
        )
        ->get();

        return view('dashboard', [
            'bestSellingProducts' => $bestSellingProducts->toArray(),
            'recentlyMovedProducts' => $recentlyMovedProducts
        ]);
    }
}
