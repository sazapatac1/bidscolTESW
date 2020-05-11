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
Route::get('/profile','HomeController@profile')->name("home.profile");
Route::get('/profile/download', 'HomeController@exportPDF')->name("home.pdf");

//Item controller
Route::get('/item/index/{option}/{id}', 'ItemController@index')->name("item.index");
Route::get('/item/create', 'ItemController@create')->name("item.create");
Route::post('/item/store', 'ItemController@store')->name("item.store");
Route::get('/item/show/{id}', 'ItemController@show')->name("item.show");
Route::post('/item/finishAuction', 'ItemController@finishAuction')->name("item.finish");
Route::delete('/item/delete/{id}', 'ItemController@destroy')->name("item.delete");

//list by filter
Route::get('/item/listByCategory/{id}', 'ItemController@listByCategory')->name("item.listByCategory");
Route::get('/item/listByState/{id}', 'ItemController@listByState')->name("item.listByState");

//Bid controller
Route::post('/bid/store', 'BidController@store')->name("bid.store");

//Comment controller
Route::get('/comment/create', 'CommentController@create')->name("comment.create");
Route::post('/comment/save', 'CommentController@store')->name("comment.store");
Route::get('/comment/succes', 'CommentController@succes')->name("comment.succes");
Route::get('/comment/show', 'CommentController@show')->name("comment.show");
Route::delete('/comment/delete/{id}', 'CommentController@destroy')->name("comment.delete");
Route::get('/comment/showspecific/{id}', 'CommentController@showspecific')->name("comment.showspecific");

//WishList controller
Route::get('wishlist', 'WishlistController@show')->name("wishlist.show");
Route::post('wishlist/store', 'WishlistController@store')->name("wishlist.store");
Route::delete('wishlist/delete/{id}', 'WishlistController@deleteOne')->name("wishlist.delete");

//category controller
Route::get('category/list', 'CategoryController@showList')->name("category.list");
Route::get('category/create', 'CategoryController@create')->name("category.create");
Route::post('category/save', 'CategoryController@save')->name("category.save");
Route::post('category/update', 'CategoryController@update')->name("category.update");
Route::delete('category/delete/{id}', 'CategoryController@deleteOne')->name("category.delete");
Route::get('category/edit/{id}', 'CategoryController@editOne')->name("category.edit");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
