<?php

namespace Asantanacu\ShareLogin\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Config;
use Symfony\Component\HttpFoundation\Cookie;

class RefreshCookies
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
        $response = $next($request);
        $config = Config::get('session');
        
        $response->headers->setCookie(new Cookie(
			$config['cookie'], $request->cookies->get($config['cookie']), $this->getCookieExpirationDate(),
                $config['path'], $config['domain'], Arr::get($config, 'secure', false)
		));
        
        return $response;
    }
    
    /**
     * Get the cookie lifetime in seconds.
     *
     * @return int
     */
    protected function getCookieExpirationDate()
    {  
    	$config = Config::get('session');
    	
    	return $config['expire_on_close'] ? 0 : Carbon::now()->addMinutes($config['lifetime']);
    }    
}