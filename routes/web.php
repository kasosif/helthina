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

Route::get('/', 'HomeController@accueil')->name('front.home');
Route::get('/articles', 'HomeController@articles')->name('front.articles');
Route::get('/recettes/{categorie}', 'HomeController@recettes')->name('front.recettes');
Route::get('/adresse', 'HomeController@adresse')->name('front.adresse');
Route::get('/adresseWeb', 'HomeController@adresseWeb')->name('front.adresseWeb');
Route::get('/forum', 'HomeController@forum')->name('front.forum');
Route::get('/recette/{id}', 'HomeController@singlerecipe')->name('front.single_recipe');
Route::get('/article/{id}', 'HomeController@singlearticle')->name('front.single_article');
Route::post('/like-article', 'HomeController@likeArticle')->name('front.like_article');
Route::post('/dislike-article', 'HomeController@dislikeArticle')->name('front.dislike_article');
Route::post('/rate-recipe', 'HomeController@rateRecipe')->name('front.rate_recipe');
Route::get('/fav-recipe/{id}', 'HomeController@favRecipe')->name('front.fav_recipe');
Route::get('/unfav-recipe/{id}', 'HomeController@unfavRecipe')->name('front.unfav_recipe');
Route::post('/comment-article', 'HomeController@commentArticle')->name('front.comment_article');
Route::view('/whyhealthi', 'whyhealthi')->name('front.whyhealthy');
Route::view('/nous', 'nous')->name('front.nous');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'dash',
    'middleware' => ['auth'],
    'as' => 'dash.'
], function () {
    Route::get('/', 'DashController@accueil')->name('home');
    Route::get('/recipe', 'DashController@savedRecipe')->name('recipe');
    Route::get('/comment', 'DashController@comment')->name('comment');
    Route::get('/gestion-article', 'DashController@gestionArticle')->name('gestionArticle');
    Route::post('/create-article', 'DashController@ajouterArticle')->name('ajouterArticle');
    Route::delete('/delete-article/{article_id}', 'DashController@deleteArticle')->name('deleteArticle');
    Route::get('/gestion-recipe', 'DashController@gestionRecipe')->name('gestionRecipe');
    Route::post('/create-recipe', 'DashController@ajouterRecipe')->name('ajouterRecipe');
    Route::delete('/delete-recipe/{recipe_id}', 'DashController@deleteRecipe')->name('deleteRecipe');
    Route::get('/gestion-adresse', 'DashController@gestionAdresse')->name('gestionAdresse');
    Route::post('/create-adresse', 'DashController@ajouterAdresse')->name('ajouterAdresse');
    Route::delete('/delete-adresse/{adresse_id}', 'DashController@deleteAdresse')->name('deleteAdresse');
    Route::get('/gestion-web-adresse', 'DashController@gestionWebAdresse')->name('gestionWebAdresse');
    Route::post('/create-web-adresse', 'DashController@ajouterWebAdresse')->name('ajouterWebAdresse');
    Route::delete('/delete-web-adresse/{web_address_id}', 'DashController@deleteWebAdresse')->name('deleteWebAdresse');
});
