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
    
});

Route::group(['middleware' => 'auth'], function () {
    //farmsのルーティング
    Route::resource('farms', 'FarmsController')
     ->except(['contact_user']);
    
   
});

Route::group(['middleware' => 'auth'], function () {
    //recruitmentのルーティング
    Route::resource('farms.recruitments', 'RecruitmentsController')
    ->except(['index', 'search']);
    
     //recruitment一覧のルーティング
    Route::get('recruitments', 'RecruitmentsController@index')
      ->name('recruitments.index');
    Route::get('recruitments/search', 'RecruitmentsController@search')
      ->name('recruitments.search');
});

Route::group(['middleware' => 'auth'], function () {
    //keywordsのルーティング
    Route::resource('recruitments.keywords', 'KeywordsController')
     ->except(['edit','update', 'destroy']);
     
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
   
});

Route::group(['middleware' => 'auth'], function () {
    //contactのルーティング
    Route::resource('farms.users.messages', 'ContactsController');
    
     //farms.contact_userのルーティング
    Route::get('farms/{farm}/contact_users', 'FarmsController@contactUsers')
      ->name('farms.contact_user');
});

Route::group(['middleware' => 'auth'], function () {
    //メッセージのルーティング
     Route::resource('farms.messages', 'MessagesController')
     ->except(['show']);
});

Route::group(['middleware' => 'auth'], function () {
    // chatroomのルーティング
    Route::resource('users.chat_rooms', 'ChatRoomController')
    ->except(['createChatRoom']);
    
    // new chatroomのルーティング
    Route::post('users/{user}/chat_rooms/create_chat_room', 'ChatRoomController@createChatRoom')
      ->name('chat_rooms.create_chat_room');
});


Route::group(['middleware' => 'auth'], function () {
    //chatMessagesのルーティング
    Route::resource('users.chat_rooms.chat_messages', 'ContactsController')
    ->except(['index, show, create,']);
});
