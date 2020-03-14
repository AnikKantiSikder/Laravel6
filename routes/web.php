<?php

use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
    //return view('index');
//});

Route::get('/','HelloController@index');






Route::get('Contact/us','HelloController@userContact')->name('contact');

Route::get('About/us', 'HelloController@aboutUs')->name('about');



//1. [Category crud are here]

Route::get('all/category', 'JelloController@allCategory')->name('all.category');

Route::get('add/category', 'JelloController@addCategory')->name('add.category');

Route::post('store/category', 'JelloController@storeCategory')->name('store.category');

//View category
Route::get('view/category/{id}','JelloController@viewCategory');//URL passed. so no need to define name
//Delete category
Route::get('delete/category/{id}','JelloController@deleteCategory');
//Edit category
Route::get('edit/category/{id}','JelloController@editCategory');
//Update category
Route::post('update/category/{id}','JelloController@updateCategory');



//2. [CRUD of (Write post)]

//Create
Route::get('write/post', 'PostController@writePost')->name('writepost');
//Create(Store data to database)
Route::post('store/post', 'PostController@storePost')->name('store.post');
//Read post
Route::get('all/post', 'PostController@allPost')->name('all.post');
//View/Read post(a specific post or details view)
Route::get('view/postdetails/{id}','PostController@viewPost');
//Edit post(a specific post or details view)
Route::get('edit/post/{id}','PostController@editPost');

//Delete post(a specific post or details view)
Route::get('delete/post/{id}','PostController@deletePost');


//Update post(a specific post or details view)
Route::post('update/post/{id}','PostController@updatePost');






