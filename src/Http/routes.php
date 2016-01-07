<?php
Route::group(['middleware' => 'web'], function () {	
    Route::get('auth/logout', 'ShareLoginController@logout');
	Route::get('token/{token}','ShareLoginController@token');
	Route::get('auth/refresh', 'ShareLoginController@refresh');
});