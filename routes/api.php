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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('api')->get('/movies', 'MoviesController@index');

// Kada pozivamo http://127.0.0.1:8000/api/movies
Route::get('/movies', 'MoviesController@index');
Route::get('/movies/{id}', 'MoviesController@show');
Route::post('/movies', 'MoviesController@store');
Route::put('/movies/{id}', 'MoviesController@update');
Route::delete('/movies/{id}', 'MoviesController@destroy');




