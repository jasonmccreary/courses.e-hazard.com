<?php

Route::get('/', 'CoursesController@index');
Route::get('/documentation', ['as' => 'documentation.index', 'uses' => 'DocumentationController@index']);

Route::resource('users', 'UsersController');
Route::resource('courses', 'CoursesController');
Route::resource('courses.classes', 'SchedulesController');

Route::get('/course-schedule/{id}', function($id) {
    $key = 'schedule-' . $id;
    $schedules = \App\Schedule::upcoming()->where('course_id', '=', $id)->orderBy('start')->get();

    $data = view('javascript.course', compact('schedules'));

    return response()->view('javascript.handler', compact('key', 'data'))->header('Content-Type', 'application/javascript');
})->where(['id' => '[0-9]+']);

Route::get('/state-schedule/{code}', function($code) {
    $state = \App\State::where('code', '=', $code)->firstOrFail();

    $key = 'schedule-' . $code;
    $schedules = \App\Schedule::upcoming()->where('state_id', '=', $state->id)->orderBy('start')->get();

    $data = view('javascript.state', compact('schedules'));

    return response()->view('javascript.handler', compact('key', 'data'))->header('Content-Type', 'application/javascript');
})->where(['code' => '[A-Z]{2}']);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
