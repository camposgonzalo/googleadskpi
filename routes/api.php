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

Route::get('records', 'CampaignController@records');
Route::get('record/{id}', 'CampaignController@record');
Route::get('record/{id}/keywords', 'CampaignController@keywords');
Route::get('record/{id}/ads', 'CampaignController@ads');
Route::get('record/{id}/search_terms', 'CampaignController@searchTerms');
