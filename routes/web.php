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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'TopicsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Topic routes
Route::resource('topics', 'TopicsController');


// Reply routes
Route::post('topics/{topic}/reply', 'RepliesController@store')->name('post_reply');

Route::get('topics/{topic}/replies', 'TopicsController@show')->name('reply');

Route::delete('reply/{reply}', 'RepliesController@destroy')->name('delete_reply');

Route::get('reply/{reply}/edit', 'RepliesController@edit')->name('edit_reply');

Route::put('reply/{reply}', 'RepliesController@update')->name('update_reply');

Route::delete('reply/{reply}', 'RepliesController@destroy')->name('destroy_reply');


// User public activities routes
Route::get('user/{user}', 'UsersController@show')->name('user');


// Members list routes
Route::get('members', 'UsersController@members')->name('members');