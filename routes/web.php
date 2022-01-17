<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', 'HomeController@index');
Route::post('/absen', 'HomeController@absen');
Route::get('/konfirmasi', 'HomeController@konfirmasi');
Route::put('/konfirmasi', 'HomeController@status');


Route::get('/profile', 'UserController@edit');
Route::put('/profile', 'UserController@update');
Route::get('/changePassword', 'PasswordController@index');
Route::post('/changePassword', 'PasswordController@edit')->name('changePassword');
Route::get('/users', 'UserController@index');
Route::get('/users/{id}', 'UserController@editUser');
Route::put('/users/{id}', 'UserController@updateUser');
Route::delete('/users/{id}', 'UserController@destroy');
