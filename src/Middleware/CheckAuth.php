<?php

namespace Asantanacu\ShareLogin\Middleware;

use Closure;
use Auth;

class CheckAuth
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
        $isLogged = Auth::check();

        $response = $next($request);
        
        if($isLogged && !Auth::check())
        	$request->session()->flash('shared_logout', true);
        else
        if(!$isLogged && Auth::check())
        	$request->session()->flash('shared_login', true);
        
        return $response;
    }
}