<?php 
namespace Asantanacu\ShareLogin;

use Route;
use Config;
use Auth;
use Session;

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
    
    public function content()
    {
    	if(Session::has('shared_login'))
    		return $this->login();
    	else
    	if(Session::has('shared_logout'))
    		return $this->logout();
    	else
    		return $this->refresh();
    }
    
    private function login()
    {
    	$result = "";
    	foreach(Config::get('sharelogin.hosts') as $host)
    	{
    		$token = str_random(32);
    		UserToken::create(['token' => $token, 'user_id' => Auth::user()->id]);
    		$result .= "<img style='display: none;' src='{$host}/token/{$token}' >";
    	}
    	return $result;    		
    }

    private function logout()
    {
    	$result = "";
    	foreach(Config::get('sharelogin.hosts') as $host)
    		$result .= "<img style='display: none;' src='{$host}/auth/logout' >";
    	return $result;    	
    }
    
    private function refresh()
    {
    	$result = "";
    	foreach(Config::get('sharelogin.hosts') as $host)
    		$result .= "<img style='display: none;' src='{$host}/refresh' >";
    	return $result;
    }
}