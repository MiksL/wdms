<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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

        return view('warehouses/show-warehouse', [
            'warehouse' => $getWarehouse,
            'id' => $id
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $newWarehouse = Warehouse::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);
    }

    public function edit()
    {

    }

    public function update()
    {
        
    }
}
?>