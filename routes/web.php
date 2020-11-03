<?php
/**
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*Route::match(
['get', 'post'],
'get-campaigns',
'AdWordsApiController@getCampaignsAction'
);
Route::match(
['get', 'post'],
'download-report',
'AdWordsApiController@downloadReportAction'
);*/

Route::group(['middleware' => 'auth'], function () {

    Route::get(
        '/',
        function () {
            return view('home.index', [
                'auth_user' => Auth::user(),
            ]);
        }
    )->name('home');

    Route::prefix('ads-campaign')->group(function () {

        Route::get('', 'CampaignController@index')->name('campaign.index');
        Route::get('googleRecords', 'CampaignController@googleRecords');
        Route::get('local/records', 'CampaignController@localRecords');
        Route::get('records', 'CampaignController@records');
        Route::get('user/{id}/records', 'CampaignController@recordsByUser');
        Route::get('api/record/{id}', 'CampaignController@recordApi');
        Route::get('record/{id}', 'CampaignController@record');
        Route::get('record/{id}/keywords', 'CampaignController@keywords');
        Route::get('record/{id}/ads', 'CampaignController@ads');
        Route::get('record/{id}/search_terms', 'CampaignController@searchTerms');
        Route::get('information/{id}', 'CampaignController@information');
        Route::get('configuration/{id}', 'CampaignController@configuration');
        Route::get('details/{id}', 'CampaignController@details');
        Route::get('create', 'CampaignController@create');
        Route::post('', 'CampaignController@store');

    });

    Route::prefix('ads-dashboard')->group(function () {
        Route::get('records', 'DashboardController@records');
        Route::get('user/{id}/records', 'DashboardController@recordsByUser');
    });

    Route::prefix('ads-request')->group(function () {
        Route::get('', 'RequestController@index')->name('request.index');
        Route::get('records', 'RequestController@records');
        Route::get('user/{id}/records', 'RequestController@recordsByUser');
        Route::get('create/{level}', 'RequestController@create');
        Route::get('edit/{id}', 'RequestController@edit');
        Route::get('record/{id}', 'RequestController@record');
        Route::post('', 'RequestController@store');
        Route::post('keyword', 'KeywordController@store');
        Route::post('ad', 'AdController@store');
    });

    Route::prefix('ads-billing')->group(function () {
        Route::get('', 'BillingController@index')->name('billing.index');
        Route::post('', 'BillingController@store');
        Route::get('records/group/users', 'BillingController@recordsGroupByUser');
        Route::get('user/{id}/records', 'BillingController@recordsByUser');
        Route::get('details', 'BillingController@details');
    });

    Route::prefix('ads-user')->group(function () {
        Route::get('', 'UserController@index')->name('user.index');
        Route::get('records', 'UserController@records');
        Route::get('record/{id}', 'UserController@recordById');
        Route::get('create', 'UserController@create');
        Route::post('', 'UserController@store');
    });

    Route::prefix('account')->group(function () {
        Route::get('', 'AccountController@index')->name('account.index');
    });

});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
