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

Route::get('/', 'HomeController@index')->name('home.index');

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    Route::get('show/{id}', 'UsersController@show')->name('users.show');
    Route::get('edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::put('update/{id}', 'UsersController@update')->name('users.update');
    Route::delete('destroy/{id}', 'UsersController@destroy')->name('users.destroy');
});
