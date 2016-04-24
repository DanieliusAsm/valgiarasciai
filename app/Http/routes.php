<?php

Route::get('/calculator', function() {
	return View::make('calculator');
});

Route::post('/calculator', 'CalculatorController@calculate');

Route::get('user', 'UserController@getUsers');

Route::get('user/new',function() {
	return View::make('register');
});

Route::post('user/new/result', 'UserController@createUser');

Route::get('user/{id}/edit', 'UserController@getUser');
Route::post('/user/{id}/edit', 'UserController@editUser');

Route::get('/user/{id}/delete', 'UserController@deleteUser');


Route::get('/user/{id}/blood', function($id){
	return View::make('blood', ['id'=>$id]);
});
Route::post('/user/{id}/blood', 'BloodController@addBlood');
Route::get('/user/{id}/body',function($id){
	return View::make('bodydata', ['id'=>$id]);
});
Route::post('/user/{id}/body','UserController@addBody');

Route::get('/products', 'ProductController@getProducts');
Route::get('/products/add', 'ProductController@addProductView');
Route::post('/products/add/submit', 'ProductController@addProduct');

Route::get('/products/{id}/edit', 'ProductController@getProduct');
Route::post('/products/{id}/edit', 'ProductController@editProduct');
Route::get('/products/{id}/delete', 'ProductController@deleteProduct');


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
	})->name('home');

	Route::post('/signup', [
		'uses' => 'LoginController@postSignUp',
		'as' => 'signup'
	]);

	Route::post('/signin', [
		'uses' => 'LoginController@postSignIn',
		'as' => 'signin'
	]);

	Route::get('/logout', [
		'uses' => 'LoginController@getLogout',
		'as' => 'logout'
	]);

	Route:: get('/dashboard', [
		'uses' => 'LoginController@getDashboard',
		'as' => 'dashboard',
		'middleware' => 'auth'
	]);
});
