<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/profile', 'HomeController@index');
Route::get('/admin', 'HomeController@admin');

//CRUD Operations for Forums
Route::post('forum/addcat', 'ForumController@addCategory');
Route::post('forum/addforum', 'ForumController@addForum');
Route::delete('forum/deleteforum', 'ForumController@deleteForum');
Route::patch('forum/changename', 'ForumController@changeName');
Route::patch('forum/changecat', 'ForumController@changeCat');

//Partials for AJAX Updating
Route::get('/forum/getcats', 'ForumController@getCategories');
