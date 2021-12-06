<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function index()
    {
        return view('warehouses');
    }

    public function show($id)
    {
        $getWarehouse = Warehouse::where('id', $id)->get();
        /*
        $currentStock = DB::Table('warehouse_stock')->where('warehouse_id', $id)
        ->join('products', 'warehouse_stock.product_id', '=', 'products.id')
        ->paginate(15);
        */
        
        // $recentlyMoved = DB::Table('shipments_to_store')->where('warehouse_id', $id)
        // ->join('products', 'shipments_to_store.shipped_product_id', '=', 'products.id')
        // ->join('stores', 'shipments_to_store.store_id', '=', 'stores.id')
        // ->select(
        //     'shipments_to_store.id',
        //     'shipments_to_store.shipped_product_id',
        //     'shipments_to_store.store_id',
        //     'products.name',
        //     'stores.name AS store_name',
        //     'products.price',
        //     'products.weight',
        //     'shipments_to_store.shipped_product_count'
        // )
        // ->paginate(15);

        return view('warehouses/show-warehouse', [
            'warehouse' => $getWarehouse,
            //'warehouseStock' => $currentStock,
            'id' => $id
            // 'recentlyMovedProducts' => $recentlyMoved
        ]);
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {
        
    }
}
?>