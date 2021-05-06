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

	//register api
Route::post('/register', 'Auth\RegisterController@register')->name('register');
//login api
Route::post('/login', 'Auth\LoginController@login')->name('login');
//logout api
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
// ログインユーザー
Route::get('/current_user', function(){
							return Auth::user();
					})->name('current_user');

Route::get('/home', 'HomeController@index')->name('home');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth'], function() {
		// Route::resource('chat_messages', 'ChatMessagesController')
		// ->except(['show']);
		Route::get('api/chat_messages/{id}', 'ChatMessageController@show');
});
