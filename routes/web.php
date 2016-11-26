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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth.basic'], function () {

    Route::get('/api/books', 'BookController@index');
    Route::get('/api/book/{id}', 'BookController@show');
    Route::post('/api/book', 'BookController@store');
    Route::put('/api/book/{id}', 'BookController@update');
    Route::delete('/api/book/{id}', 'BookController@destroy');
});
