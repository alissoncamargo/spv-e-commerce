<?php

namespace Shoppvel\Http\Middleware;

use Closure;

class cozinha {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        
        if(\Session::get('cozinha') == false){
    
            return redirect('login_teste');
        }
            
        return $next($request);
    }

}
