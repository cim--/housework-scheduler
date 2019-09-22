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
Route::post('/task/{task}/complete', 'TaskController@complete')->name('task.complete');
Route::get('/task/{task}/edit', 'TaskController@edit')->name('task.edit');
Route::post('/task/{task}/edit', 'TaskController@update')->name('task.update');
Route::get('/task/new', 'TaskController@construct')->name('task.construct');
Route::post('/task/new', 'TaskController@create')->name('task.create');
Route::get('/item/new', 'ItemController@create')->name('item.create');
Route::post('/item/new', 'ItemController@store')->name('item.store');
Route::post('/item/{item}/delete', 'ItemController@destroy')->name('item.destroy');
