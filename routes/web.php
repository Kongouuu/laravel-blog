<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', 'PagesController@getIndex');
Route::get('about', 'PagesController@getAbout');

Route::get('contact', ['uses' => 'PagesController@getContact', 'as' => 'contact.show']);
Route::post('contact', ['uses' => 'PagesController@postContact', 'as' => 'contact.post']);

// Blogs
Route::get('blogs', ['uses' => 'BlogController@getIndex', 'as' => 'blogs.index']);
Route::get('blogs/{id}',['uses' => 'BlogController@getBlog', 'as' => 'blogs.show']);

// Posts
Route::resource('posts', 'PostController');

// Comments
Route::post('comments/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store']);
Route::delete('comments/{comment}',['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);

// Categories
Route::resource('categories', 'CategoryController',['except' => ['create']]);

// Tags
Route::resource('tags', 'TagController',['except' => ['create']]);

// Authentication
Auth::routes();

// Use with Auth, direct after log-in
Route::get('/notice', 'HomeController@index')->name('home');
