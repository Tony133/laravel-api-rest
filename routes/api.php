<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
	return $request->user();
})->middleware('auth:api');

Route::group(['middleware' => 'auth.basic'], function () {
    Route::get('/api/books', 'BookController@index');
    Route::get('/api/books/{id}', 'BookController@show');
    Route::post('/api/books', 'BookController@store');
    Route::put('/api/books/{id}', 'BookController@update');
    Route::delete('/api/books/{id}', 'BookController@destroy');
});
