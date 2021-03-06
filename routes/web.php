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

Route::get('/', 'IndexController@home')->name('home');
Route::resource('user', 'UserController');
Route::get('logout', 'LoginController@logout')->name('logout');
Route::get('login', 'LoginController@login')->name('login');
Route::post('login', 'LoginController@store')->name('login');
Route::get('admin', 'IndexController@admin_home')->name('admin_home');
Route::resource('category', 'CategoryController');
Route::resource('article', 'ArticleController');
Route::get('category/{category}/{article}','IndexController@category_article')->name('category_article');
