<?php

Route::get('/', 'CoursesController@index');

Route::resource('users', 'UsersController');
Route::resource('courses', 'CoursesController');
Route::resource('courses.classes', 'SchedulesController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
