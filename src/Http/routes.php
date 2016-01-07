<?php
Route::group(['middleware' => 'web'], function () {	
    Route::get('sharelogin/logout', 'Asantanacu\ShareLogin\Http\Controllers\ShareLoginController@logout');
	Route::get('sharelogin/token/{token}','Asantanacu\ShareLogin\Http\Controllers\ShareLoginController@token');
	Route::get('sharelogin/refresh', 'Asantanacu\ShareLogin\Http\Controllers\ShareLoginController@refresh');
});