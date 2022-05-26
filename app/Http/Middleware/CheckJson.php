<?php

namespace App\Http\Middleware;

use Closure;

class CheckJson
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
        if ($request->stu) {
            $arr =  json_decode($request->stu);
            dd($arr);
            return response()->json($arr);
        }
        return $next($request);
    }
}
