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
Route::group(['prefix'=>'task','as'=>'task.'],function (){
    Route::get('all', 'TaskController@all')->name('all');
    Route::get('/{task}', 'TaskController@show')->name('show');
    Route::post('/', 'TaskController@store')->name('store');
    Route::put('/{task}', 'TaskController@update')->name('update');
    Route::delete('/{task}', 'TaskController@destroy')->name('destroy');
});
