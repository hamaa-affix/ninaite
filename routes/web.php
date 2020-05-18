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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('farms', 'FarmsController');
});

//Recruitmentのルーティング
Route::group(['middleware' => 'auth'], function () {
    Route::resource('recruitments', 'RecruitmentsController');
});

//Route::get('/recruitments/index', 'RecruitmentsController@index');
