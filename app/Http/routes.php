<?php

Route::get('/home', function() {
	return View::make('home');
});

Route::get('/calculator', function() {
	return View::make('calculator');
});

Route::post('/calculator', 'CalculatorController@calculate');
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

	// ADMIN
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
	Route::group(['middleware'=> ['auth']], function(){
		Route::get('/account', [
				'uses' => 'LoginController@getAccount',
				'as' => 'account',
		]);

		Route::post('/update', [
				'uses' => 'LoginController@postUpdate',
				'as' => 'account.save'
		]);

		Route::get('/dashboard', [
				'uses' => 'LoginController@getDashboard',
				'as' => 'dashboard',
		]);

		//USER
		Route::get('user', [
				'as'=>'user',
				'uses'=>'UserController@getUsers',
		]);
		Route::get('user/new',[
				function() {
					return View::make('register');}
		]);
		Route::post('user/new', 'UserController@createUser');
		Route::get('user/{id}/edit', 'UserController@getUser');
		Route::post('/user/{id}/edit', 'UserController@editUser');
		Route::get('user/{id}/data',[function($id){
			return View::make('register',['id'=>$id]);
		}]);
		Route::post('user/{id}/data', [
				'uses' => 'UserController@addUserData',
				'as' => 'addUserData'
		]);
		Route::get('/user/{id}/delete', 'UserController@deleteUser');

		// PRODUCT
		Route::get('/products', [
			'uses'=>'ProductController@getProducts',
			'as'=>'products'
		]);
		Route::get('/products/add', 'ProductController@addProductView');
		Route::post('/products/add/submit', 'ProductController@addProduct');
		Route::get('/products/{id}/edit', 'ProductController@getProduct');
		Route::post('/products/{id}/edit', 'ProductController@editProduct');
		Route::get('/products/{id}/delete', 'ProductController@deleteProduct');
		Route::post('/products/{id}/addrecipe', 'ProductController@addRecipe');
		Route::get('/products/{id}/addrecipe', function($id){
			return View::make('recipe', ['id'=>$id]);
		});

		// DIET
		Route::get('/diets/{id}',[
				'as'=>'diets',
				function($id){
					return View::make('diets',['id'=>$id]);
				}]);
		Route::get('/diet/{id}/new',[
				'uses'=>'DietController@getProducts',
				'as'=>'newDiet'
		]);
	});

});
