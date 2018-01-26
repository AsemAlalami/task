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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('/', 'HomeController@dashboard');
    Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('tasks/fetch', 'TaskController@fetch')->name('tasks.fetch');
    Route::resource('tasks', 'TaskController');
});

Auth::routes();

