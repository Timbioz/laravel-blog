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

Route::get('phpinfo', function () {
    return view('phpinfo');
});

Route::namespace('Admin')->middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'AdminController@index')->name('index');
    // Posts
    Route::get('/posts', 'PostsController@index')->name('posts');
    Route::get('/posts/create', 'PostsController@create')->name('posts.create');
    Route::post('/posts/create', 'PostsController@store')->name('posts.create');
    // Categories
    Route::get('/categories', 'CategoriesController@index')->name('categories');
    Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
    Route::post('/categories/create', 'CategoriesController@store')->name('categories.create');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'HomeController@test')->name('home');
