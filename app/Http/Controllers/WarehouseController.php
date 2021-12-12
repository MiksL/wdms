<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\Warehouse_Stock;

class WarehouseController extends Controller
{
    public function index()
    {
        return view('warehouses');
    }

    public function show($id)
    {
        $getWarehouse = Warehouse::where('id', $id)->get();

        return view('warehouses/show-warehouse', [
            'warehouse' => $getWarehouse,
            'id' => $id
        ]);
    }

    public function create()
    {
        return view('warehouses.add-warehouse');
    }

    public function createShipment(Request $request)
    {
        $updateWarehouseStock = Warehouse_Stock::where('warehouse_id', $request->warehouse_id)
        ->where('product_id', $request->shipped_product_id)
        ->first();

        if($updateWarehouseStock->product_count - $request->shipped_product_count >= 0)
        {
            $newShipment = DB::table('shipments_to_store')->insert([
                'warehouse_id' => $request->warehouse_id,
                'store_id' => $request->store_id,
                'shipped_product_id' => $request->shipped_product_id,
                'shipped_product_count' => $request->shipped_product_count
            ]);

            $updateWarehouseStock->update([
                'product_count' => $updateWarehouseStock->product_count - $request->shipped_product_count,
            ]);
        }
    }

    public function store(Request $request)
    {
        $newWarehouse = Warehouse::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);

        return view('warehouses');
    }

    public function edit()
    {

    }

    public function update()
    {
        
    }
}
?>