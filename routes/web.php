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

Route::get(
    '/',
    function () {
        return view('home.index');
    }
)->name('home');

Route::match(
    ['get', 'post'],
    'get-campaigns',
    'AdWordsApiController@getCampaignsAction'
);
Route::match(
    ['get', 'post'],
    'download-report',
    'AdWordsApiController@downloadReportAction'
);

Route::prefix('ads-campaign')->group(function () {

    Route::get('', 'CampaignController@index')->name('campaign.index');
    Route::get('records', 'CampaignController@records');

});

Route::prefix('ads-dashboard')->group(function () {

    Route::get('records', 'DashboardController@records');

});
