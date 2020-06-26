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
    //usersのルーティング
    Route::resource('users', 'UsersController');
    
    //farmsのルーティング
    Route::resource('farms', 'FarmsController')
     ->except(['contact_user']);
    
    //recruitmentのルーティング
    Route::resource('farms.recruitments', 'RecruitmentsController')
    ->except(['index', 'search']);
    
    //keywordsのルーティング
    Route::resource('recruitments.keywords', 'KeywordsController')
     ->except(['edit','update', 'destroy']);
     
    //メッセージのルーティング
     Route::resource('farms.messages', 'MessagesController')
     ->except(['show']);
    
    // chatroomのルーティング
    Route::resource('farms.users.chatrooms', 'ChatRoomController')
    ->except(['createChatRoom']);
    
    Route::resource('farms.users.messages', 'ContactsController');
});


Route::group(['middleware' => 'auth'], function () {
    //recruitment一覧のルーティング
    Route::get('recruitments', 'RecruitmentsController@index')
      ->name('recruitments.index');
    Route::get('recruitments/search', 'RecruitmentsController@search')
      ->name('recruitments.search');
    //各keywordsのルーテイング
    Route::get('/keywords/{id}/edit', 'KeywordsController@edit')
      ->name('keywords.edit');
    Route::PUT('keywords/{id}', 'KeywordsController@update')
      ->name('keywords.update');
    Route::delete('keywords/{id}', 'KeywordsController@destroy')
      ->name('keywords.destroy');
    //keyword検索のルーティング
    Route::get('keywords/{keyword}/search_tags', 'KeywordsController@searchTags')
      ->name('keywords.search_tags');
    //farms.contact_userのルーティング
    Route::get('farms/{farm}/contact_users', 'FarmsController@contactUsers')
      ->name('farms.contact_user');
      
    Route::get('farms/{farm}/users/{user}/chatrooms', 'ChatRoomController@createChatRoom')
      ->name('chat_rooms.create_chat_room');
});
