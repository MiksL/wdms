<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use App\Models\Store;

class StoreController extends Controller
{
    public function Stores(Store $store)
    {
        $stores = $store->sortable()->paginate(15);
        return view('Stores', [
            'Stores' => $stores,
        ]);
    }
}
?>