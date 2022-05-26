<?php

namespace App\Http\Middleware;

use Closure;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        #check if the user role is admin or not
        if($request->role !='admin'){
            return response()->json(['status'=>'NG','message'=>'You are not allowed to access this page.'],200);
        }
        return $next($request);
    }
}
