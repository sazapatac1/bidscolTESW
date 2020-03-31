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

Route::get('/', 'HomeController@index')->name("home.index");
Route::get('/info','HomeController@info')->name("home.info");

//Item controller
Route::get('/item/index', 'ItemController@index')->name("item.index");
Route::get('/item/create', 'ItemController@create')->name("item.create");
Route::post('/item/store', 'ItemController@store')->name("item.store");
Route::get('/item/show/{id}', 'ItemController@show')->name("item.show");
Route::delete('/item/delete/{id}', 'ItemController@destroy')->name("item.delete");

//Comment controller
Route::get('/comment/create', 'CommentController@create')->name("comment.create");
Route::post('/comment/save', 'CommentController@save')->name("comment.save");
Route::get('/comment/succes', 'CommentController@succes')->name("comment.succes");
Route::get('/comment/show', 'CommentController@show')->name("comment.show");
Route::delete('/comment/delete/{id}', 'CommentController@destroy')->name("comment.delete");
Route::get('/comment/showspecific/{id}', 'CommentController@showspecific')->name("comment.showspecific");

//FavoritesList controller
Route::get('/favoritesList/index', 'FavoritesListController@index')->name("favoritesList.index");
Route::get('/favoritesList/create', 'FavoritesListControllerController@create')->name("favoritesList.create");
Route::post('/favoritesList/save', 'FavoritesListControllerController@store')->name("favoritesList.store");
Route::get('/favoritesList/show/{id}', 'FavoritesListControllerController@show')->name("favoritesList.show");
Route::delete('/favoritesList/delete/{id}', 'FavoritesListControllerController@destroy')->name("favoritesList.delete");

//category controller
Route::get('category/list', 'CategoryController@showList')->name("category.list");
Route::get('category/create', 'CategoryController@create')->name("category.create");
Route::post('category/save', 'CategoryController@save')->name("category.save");
Route::post('category/update', 'CategoryController@update')->name("category.update");
Route::delete('category/delete/{id}', 'CategoryController@deleteOne')->name("category.delete");
Route::get('category/edit/{id}', 'CategoryController@editOne')->name("category.edit");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');