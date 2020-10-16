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

Route::get('/', function () {
    return view('welcome');
});
Route::get('home', 'HomeController@show')->name('home');

Route::post('news/toggle/{id}','NewsItemController@toggle')->name('news.toggle');
Route::get('news/search', 'NewsItemController@search')->name('news.search');
Route::get('news', 'CategoryController@show')->name ('news');
Route::post('news/filter','CategoryController@filter')->name('news.filter');



Route::get('news/create', 'NewsItemController@create')->name ('news.create')->middleware('auth');
Route::post('news/store', 'NewsItemController@store')->name ('news.store');
Route::get('news/{id}', 'NewsItemController@show')->name('news.show');


Route::post('like', 'LikesController@like');
Route::delete('like', 'LikesController@dislike');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('news/delete/{newsItem_id}', 'NewsItemController@delete')->name('news.delete')->middleware('auth');
Route::get('news/edit/{id}', 'NewsItemController@edit')->name('news.edit')->middleware('auth');
Route::put('news/{id}', 'NewsItemController@update')->name('news.update');




