<?php

namespace App\Http\Middleware;

use Closure;

class CustomValidation
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
        #check if form name is valid
        if(!preg_match("/^[a-zA-Z-' ]*$/",$request->name)||empty($request->name)){
            return response()->json(['status'=>"NG",'message'=>'Name is wrong!'],200);
        }
        #check if form pwd is valid
        if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/",$request->pwd)){
            return response()->json(['status'=>"NG",'message'=>'Password is wrong!(Must have at least 6 chars with 1 letter and 1 number.)'],200);
        }
        return $next($request);
    }
}
