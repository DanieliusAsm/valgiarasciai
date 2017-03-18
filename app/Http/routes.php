<?php

Route::get('/', [
	'as'=>'about',
	function(){
		return View::make('about');
	}
]);

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
        Route::get('/products/{name}',[
            'uses'=>'ProductController@getProductsByName',
            'as'=>'getProductsByName',
        ]);
		Route::post('/products/{id}/addrecipe', 'ProductController@addRecipe');
		Route::get('/products/{id}/addrecipe', function($id){
			return View::make('recipe', ['id'=>$id]);
		});
		// DIET
		Route::get('/user/{id}/diets',[
				'as'=>'diets',
				'uses'=>'DietController@getUserDiets'
		]);
		Route::get('/user/{id}/diet/new',[
				'uses'=>'DietController@getProducts',
				'as'=>'newDiet'
		]);
		Route::post('/user/{id}/diet/new',[
			'uses'=>'DietController@saveDiet',
			'as'=>'saveDiet'
		]);
		Route::post('/diet/export/{dietType}',[
			'uses'=>'DietController@exportDiet',
			'as'=>'exportDiet'
		]);
        Route::get('user/{id}/diet/{dietId}/edit',[
            function($id,$dietId){return View::make('adddiet',['id'=>$id,'dietId'=>$dietId]);},
            'as'=>'editDiet'
        ]);
        Route::post('user/{id}/diet/{dietId}/edit',[
            'uses'=>'DietController@editDiet',
            'as'=>'saveEditedDiet'
        ]);
        Route::get('diet/{dietId}/get',[
            'uses'=>'DietController@getDietById',
            'as'=>'getDietById'
        ]);
		Route::get('/calculator', [
			function() {return View::make('calculator');},
			'as'=>'calculator'
		]);
	});

});
