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

Route::get('/','HomeController@accueil')->name('front.home');
Route::get('/articles','HomeController@articles')->name('front.articles');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
