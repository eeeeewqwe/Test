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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('Home');
Route::post('/home', 'HomeController@send')->name('storeMessage');

Route::post('/new-room', 'RoomController@storeRoom')->name('storeRoom');
Route::get('/room/{id}', 'RoomController@showRoom')->name('showRoom');
Route::post('/room', 'RoomController@addUsersToRoom')->name('addUser');

Route::get('/chat-room/{id}', 'RoomController@roomChat')->name('roomChatForm');
Route::post('/chat-room', 'RoomController@chat')->name('storeChatRoom');