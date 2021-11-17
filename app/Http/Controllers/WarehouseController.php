<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function index(Warehouse $warehouse)
    {
        $warehouses = $warehouse->sortable()->paginate(15);
        return view('warehouses', [
            'warehouses' => $warehouses,
        ]);
    }

    public function show($id)
    {
        $getWarehouse = Warehouse::where('id', $id)->get();
        $currentStock = DB::Table('warehouse_stock')->where('warehouse_id', $id)
        ->join('products', 'warehouse_stock.product_id', '=', 'products.id')
        ->paginate(15);

        return view('warehouses/show-warehouse', [
            'warehouse' => $getWarehouse,
            'warehouseStock' => $currentStock
        ]);
    }
}
?>