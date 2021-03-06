<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreManagerCheck
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
        $storeID = $request->route('id');
        $storeManagers = DB::table('store_managers')->where('store_id', $storeID)->pluck('manager_id')->toArray();
        if(in_array(Auth::id(), $storeManagers) )
        {
            return $next($request);
        }
        abort(403);
    }
}
