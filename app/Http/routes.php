<?php

Route::get('/', function() {
	return View::make('index');
});

Route::post('/rezultatas', 'KMIController@calculateKMI');

Route::get('/user', 'UserController@getUsers');

Route::get('/user/new',function(){
	return View::make('register');
});

Route::post('user/new/result', 'UserController@createUser');

Route::get('user/{id}/edit', function() {
	return View::make('edituser');
});

Route::post('/user/{id}/edit', 'UserController@editUser');

Route::get('/user/{id}/delete', 'UserController@deleteUser');

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

	Route::get('/login', function() {
		return view('login');
	});

	Route::post('/signup', [
		'uses' => 'LoginController@postSignUp',
		'as' => 'signup'
	]);

	Route::post('/signin', [
		'uses' => 'LoginController@postSignIn',
		'as' => 'signin'
	]);

	Route:: get('/dashboard', [
		'uses' => 'LoginController@getDashboard',
		'as' => 'dashboard'
	]);
});
