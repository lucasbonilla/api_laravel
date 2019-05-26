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

Route::namespace('Api')->name('api.')->group(function(){
    Route::prefix('schedule')->group(function(){
        Route::get('/', 'ScheduleController@index')->name('schedule');
        Route::get('/{id}', 'ScheduleController@show')->name('single_schedule');
        Route::post('/', 'ScheduleController@store')->name('store_schedule');
        Route::put('/{id}', 'ScheduleController@update')->name('update_schedule');
        Route::delete('/{id}', 'ScheduleController@delete')->name('delete_schedule');
        Route::get('/search', 'ScheduleController@search')->name('search_schedule');
    });
});