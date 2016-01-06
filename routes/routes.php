<?php
Route::group(['middleware' => 'web'], function () {
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
});