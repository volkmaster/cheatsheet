<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('base');
});

Route::get('/register', 'RegistrationController@create');
Route::get('/login', 'SessionsController@create');

Route::get('/{vue_capture?}', function () {
    return view('base');
})->where('vue_capture', '[\/\w\.-]*');

