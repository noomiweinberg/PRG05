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

Route::get('news', 'CategoryController@show')->name ('news');

Route::get('news/create', 'NewsItemController@create')->name ('news.create')->middleware('auth');
Route::post('news/store', 'NewsItemController@store')->name ('news.store');
Route::get('news/{id}', 'NewsItemController@show')->name('news.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

