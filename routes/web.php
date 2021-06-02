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

Route::get('/','HomeController@accueil')->name('front.home');
Route::get('/articles','HomeController@articles')->name('front.articles');
Route::get('/recettes/{categorie}','HomeController@recettes')->name('front.recettes');
Route::get('/adresse','HomeController@adresse')->name('front.adresse');
Route::get('/adresseWeb','HomeController@adresseWeb')->name('front.adresseWeb');
Route::get('/forum','HomeController@forum')->name('front.forum');
Route::get('/recette/{id}','HomeController@singlerecipe')->name('front.single_recipe');
Route::get('/article/{id}','HomeController@singlearticle')->name('front.single_article');
Route::view('/whyhealthi','whyhealthi')->name('front.whyhealthy');
Route::view('/nous','nous')->name('front.nous');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'dash',
    'middleware' => ['auth'] ,
    'as' => 'dash.'
],function () {
    Route::get('/', 'DashController@index')->name('home');
});
