<?php

Route::get('/', function() {
	return View::make('index');
});

Route::get('userlist', function() {
	return View::make('userlist');
});

Route::post('/rezultatas', 'KMIController@calculateKMI');
