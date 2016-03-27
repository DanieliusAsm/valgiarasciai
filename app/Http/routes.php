<?php

Route::get('/', function() {
	return View::make('index');
});

Route::get('/user/new',function(){
	return view('NewUser');
});

Route::get('/user', 'UserController@getUsers');

Route::post('/rezultatas', 'KMIController@calculateKMI');

Route::post('user/new/result', 'UserController@createUser');

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
