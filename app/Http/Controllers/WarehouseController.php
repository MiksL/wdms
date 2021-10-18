<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function warehouses(Warehouse $warehouse)
    {
        $warehouses = $warehouse->sortable()->paginate(15);
        return view('warehouses', [
            'warehouses' => $warehouses,
        ]);
    }
}
?>