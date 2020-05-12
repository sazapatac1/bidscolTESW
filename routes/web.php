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

//Rutas de admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin','UserController@admin')->name("user.admin");
    //items
    Route::get('item/list', 'ItemController@showList')->name("item.list");
    Route::get('item/edit/{id}', 'ItemController@editOne')->name("item.edit");
    Route::post('item/update', 'ItemController@update')->name("item.update");
    //Bids
    Route::delete('/bid/delete/{id}', 'BidController@deleteOne')->name("bid.delete");
    Route::get('bid/list', 'BidController@showList')->name("bid.list");
    Route::get('bid/edit/{id}', 'BidController@editOne')->name("bid.edit");
    Route::post('bid/update', 'BidController@update')->name("bid.update");
    //Comments
    Route::get('comment/list', 'CommentController@showList')->name("comment.list");
    Route::get('comment/edit/{id}', 'CommentController@editOne')->name("comment.edit");
    Route::post('comment/update', 'CommentController@update')->name("comment.update");
    //category controller
    Route::get('category/list', 'CategoryController@showList')->name("category.list");
    Route::get('category/create', 'CategoryController@create')->name("category.create");
    Route::post('category/save', 'CategoryController@save')->name("category.save");
    Route::post('category/update', 'CategoryController@update')->name("category.update");
    Route::delete('category/delete/{id}', 'CategoryController@deleteOne')->name("category.delete");
    Route::get('category/edit/{id}', 'CategoryController@editOne')->name("category.edit");
    
});


Route::get('/', 'HomeController@index')->name("home.index");
Route::get('/info','HomeController@info')->name("home.info");
Route::get('/profile','UserController@profile')->name("user.profile");
Route::get('/profile/download', 'UserController@exportPDF')->name("user.pdf");
Route::get('/contact', 'HomeController@contact')->name('home.contact');
Route::get('/about', 'HomeController@about')->name('home.about');



//Item controller
Route::get('/item/index/{option}/{id}', 'ItemController@index')->name("item.index");
Route::get('/item/create', 'ItemController@create')->name("item.create");
Route::post('/item/store', 'ItemController@store')->name("item.store");
Route::get('/item/show/{id}', 'ItemController@show')->name("item.show");
Route::post('/item/finishAuction', 'ItemController@finishAuction')->name("item.finish");
Route::delete('/item/delete/{id}', 'ItemController@deleteOne')->name("item.delete");


//Bid controller
Route::post('/bid/store', 'BidController@store')->name("bid.store");


//Comment controller
Route::get('/comment/create', 'CommentController@create')->name("comment.create");
Route::post('/comment/save', 'CommentController@store')->name("comment.store");
Route::get('/comment/show', 'CommentController@show')->name("comment.show");
Route::delete('/comment/delete/{id}', 'CommentController@deleteOne')->name("comment.delete");


//FavoritesList controller
Route::get('/favoritesList/index', 'FavoritesListController@index')->name("favoritesList.index");
Route::get('/favoritesList/create', 'FavoritesListControllerController@create')->name("favoritesList.create");
Route::post('/favoritesList/save', 'FavoritesListControllerController@store')->name("favoritesList.store");
Route::get('/favoritesList/show/{id}', 'FavoritesListControllerController@show')->name("favoritesList.show");
Route::delete('/favoritesList/delete/{id}', 'FavoritesListControllerController@destroy')->name("favoritesList.delete");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
