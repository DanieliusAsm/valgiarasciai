<?php


Route::get('/', function()
{
	return View::make('index');
});

Route::post('/rezultatas', 'KMIController@calculateKMI');
