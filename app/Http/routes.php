<?php

Route::get('/calculator', function() {
	return View::make('calculator');
});

Route::post('/calculator', 'CalculatorController@calculate');

Route::get('/user', 'UserController@getUsers');

Route::get('/user/new',function(){
	return View::make('register');
});

Route::post('user/new/result', 'UserController@createUser');

Route::get('user/{id}/edit', 'UserController@getUser');
Route::post('/user/{id}/edit', 'UserController@editUser');

Route::get('/user/{id}/delete', 'UserController@deleteUser');

Route::get('/user/{id}/data/body',function($id){
	return View::make('bodydata', ['id'=>$id]);
});
Route::post('/user/{id}/data/body','UserController@addBody');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	//
});
