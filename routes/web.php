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
})->name('home');

Route::get('login', array('uses' => 'SessionsController@create', 'as' => 'login'));
Route::get('logout', array('uses' => 'SessionsController@destroy', 'as' => 'logout'));
Route::get('register', array('uses' => 'RegistrationController@create', 'as' => 'register'));

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/{vue_capture?}', function () {
    return view('base');
})->where('vue_capture', '[\/\w\.-]*');

