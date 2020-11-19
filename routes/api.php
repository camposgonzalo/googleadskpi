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

Route::get('home', 'HomeController@home');
Route::get('home2', 'HomeController@home2');
Route::get('locations', 'TableController@locations')->name('tables.locations');
Route::get('prueba/{account_id}', 'UserController@prueba');
