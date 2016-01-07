<?php
Route::group(['middleware' => 'web'], function () {	
    Route::get('auth/logout', 'Asantanacu\ShareLogin\Http\Controllers\ShareLoginController@logout');
	Route::get('token/{token}','Asantanacu\ShareLogin\Http\Controllers\ShareLoginController@token');
	Route::get('auth/refresh', 'Asantanacu\ShareLogin\Http\Controllers\ShareLoginController@refresh');
});