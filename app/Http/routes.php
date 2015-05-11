<?php

Route::get('/', 'PagesController@index');

Route::resource('users', 'UsersController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
