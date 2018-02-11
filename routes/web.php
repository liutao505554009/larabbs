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

Route::namespace('Home')->group(function () {
    Route::get('/', 'IndexController@index')->name('home');
    Auth::routes();
    Route::resource('users', 'UserController', ['only' => ['show', 'update', 'edit']]);
    Route::resource('topics', 'TopicsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
    Route::resource('categories', 'CategoryController', ['only' => ['show']]);


    Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
    Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');
    Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');
});


