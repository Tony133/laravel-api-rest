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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth.basic'], function () {
    Route::get('/books', 'BookController@index')->name('books.index');
    Route::get('/books/{id}', 'BookController@show')->name('books.show');
    Route::post('/books', 'BookController@store')->name('books.store');
    Route::put('/books/{id}', 'BookController@update')->name('books.update');
    Route::delete('/books/{id}', 'BookController@delete')->name('books.delete');
});
