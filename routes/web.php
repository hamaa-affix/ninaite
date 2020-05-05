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

//userのcrud
Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    Route::get('show/{id}', 'UsersController@show')->name('users.show');
    Route::get('edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::put('update/{id}', 'UsersController@update')->name('users.update');
    Route::delete('destroy/{id}', 'UsersController@destroy')->name('users.destroy');
});

//farmsのcrud
Route::group(['prefix' => 'farms', 'middleware' => 'auth'], function() {
    Route::get('index', 'FarmsController@index')->name('farms.index');
    Route::get('create', 'FarmsController@create')->name('farms.create');
    Route::post('store', 'FarmsController@store')->name('farms.store');
});

