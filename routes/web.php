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

Route::get('/', 'TaskController@index')->name('dashboard');
Route::post('/{task}/complete', 'TaskController@complete')->name('complete');
Route::get('/new', 'TaskController@construct')->name('construct');
Route::post('/new', 'TaskController@create')->name('create');

