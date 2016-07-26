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


Route::get('/', 'ForumController@index');
Route::auth();

Route::get('/profile', 'HomeController@index');
Route::get('/admin', 'HomeController@admin');

Route::get('/forum/show/{slug}', 'ForumController@viewForum');

//Topics
Route::get('/forum/topic/new/{forum_id}', 'TopicController@newTopic');
Route::post('/forum/topic/new', 'TopicController@createTopic');
Route::get('/forum/topic/{slug}', 'TopicController@viewTopic');
Route::delete('forum/topic/delete/{id}', 'TopicController@deleteTopic');
Route::patch('forum/topic/edit/{id}', 'TopicController@editTopic');

//Posts
Route::get('/forum/post/new/{id}', 'PostController@newPost');
Route::post('/forum/post/new/{id}', 'PostController@createPost');
Route::delete('/forum/post/delete/{id}', 'PostController@deletePost');
Route::patch('/forum/post/edit/{id}', 'PostController@editPost');

//CRUD Operations for Forums
Route::post('forum/addcat', 'ForumController@addCategory');
Route::post('forum/addforum', 'ForumController@addForum');
Route::delete('forum/deleteforum', 'ForumController@deleteForum');
Route::patch('forum/changename', 'ForumController@changeName');
Route::patch('forum/changecat', 'ForumController@changeCat');


//Partials for AJAX Updating
Route::get('/forum/getcats', 'ForumController@getCategories');
