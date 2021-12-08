<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function index(Store $store)
    {
        return view('stores');
    }

    public function create()
    {
        return view('stores.add-store');
    }

    public function store(Request $request)
    {
        $newStore = Store::create([
            'name' => $request->name,
            'location' => $request->location,
            'supplying_warehouse_id' => $request->supplyingWarehouse
        ]);
        return view('stores');
    }

    public function edit()
    {

    }

    public function update()
    {
        
    }
}
?>