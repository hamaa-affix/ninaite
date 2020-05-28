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
    Route::resource('farms.recruitments', 'RecruitmentsController')
    ->except(['index']);
});

Route::get('recruitments', 'RecruitmentsController@index')
       ->middleware('auth')
       ->name('recruitments.index');
//keywordsのルーティング       
Route::group(['middleware' => 'auth'], function () {
    Route::resource('recruitments.keywords', 'KeywordsController')
     ->except(['edit','update']);
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/keywords/{id}/edit', 'KeywordsController@edit')
       ->name('keywords.edit');
    Route::PUT('keywords/{id}', 'KeywordsController@update')
    ->name('keywords.update');
});
