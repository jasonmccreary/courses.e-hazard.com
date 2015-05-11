<?php

Route::get('/', 'PagesController@index');

Route::resource('users', 'UsersController');
Route::resource('classes', 'SchedulesController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
