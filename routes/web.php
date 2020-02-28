<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MemoController@index');

Route::resource('memos', 'MemoController');

Route::resource('goals','GoalController');

Route::get('/holiday', 'CalendarController@getHoliday');
Route::post('/holiday', 'CalendarController@postHoliday');
