<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Redirect;
use Illuminate\Support\Facades\Auth;

class login
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
       

        if(Auth::check()){
            // dd('ya estas logeado');
            return redirect()->route('home');
            
        }else{
           return $next($request); 
        }
    }
}
