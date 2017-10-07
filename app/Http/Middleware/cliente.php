<?php

namespace Shoppvel\Http\Middleware;

use Closure;

class cliente {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        
        if(\Session::get('cliente') == false){
    
            return redirect('login');
        }
            
        return $next($request);
    }

}
