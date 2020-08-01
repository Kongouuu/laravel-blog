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
Route::get('contact', 'PagesController@getContact');
Route::get('blogs', ['uses' => 'BlogController@getIndex', 'as' => 'blogs.index']);
Route::get('blogs/{id}',['uses' => 'BlogController@getBlog', 'as' => 'blogs.show']);
// ('url', 'controller')
Route::resource('posts', 'PostController');
Auth::routes();

Route::get('/notice', 'HomeController@index')->name('home');
