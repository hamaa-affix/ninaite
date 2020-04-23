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

//Route::get('/', function () {
    //return view('top');
//})->middleware('auth');

Auth::routes();

Route::get('/', 'HomeController@index')->name('top');

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    Route::get('index', 'UserController@index')->name('users.index');
    
});
