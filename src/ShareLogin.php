<?php 
namespace Asantanacu\ShareLogin;

use Route;
use Config;
use Auth;

class ShareLogin{
    public function routes()
    {            
   		Route::get('auth/logout', function(){
   			Auth::logout();
   		});
        
	    Route::get('/token/{token}', function ($token) {
	    	$usertoken = UserToken::where('token',$token)->firstOrFail();
	    	Auth::loginUsingId($usertoken->user_id);
	    	$usertoken->delete();
	    });
	    
		Route::get('/refresh', function () {
			return;
		});
    }
    
    public function login()
    {
    	foreach(Config::get('sharelogin.hosts') as $host)
    	{
    		$token = str_random(32);
    		Auth::user()->usertokens()->create(['token' => $token]);
    		$result .= "<img style='display: none;' src='{$host}/token/{$token}' >";
    	}
    	return $result;    		
    }

    public function logout()
    {
    	$result = "";
    	foreach(Config::get('sharelogin.hosts') as $host)
    		$result .= "<img style='display: none;' src='{$host}/auth/logout' >";
    	return $result;    	
    }
    
    public function refresh()
    {
    	$result = "";
    	foreach(Config::get('sharelogin.hosts') as $host)
    		$result .= "<img style='display: none;' src='{$host}/refresh' >";
    	return $result;
    }
}