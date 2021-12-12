<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WarehouseManagerCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $warehouseID = $request->route('id');
        $warehouseManagers = DB::table('warehouse_managers')->where('warehouse_id', $warehouseID)->pluck('manager_id')->toArray();
        if(in_array(Auth::id(), $warehouseManagers) )
        {
            return $next($request);
        }
        abort(403);
    }
}
