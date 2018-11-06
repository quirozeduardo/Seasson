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

Auth::routes();
Route::get('/', 'IndexController');
Route::get('/cart','CartController');
Route::get('/cart/add/{articleId}','CartController@addToCart');
Route::get('/cart/remove/{articleId}','CartController@removeToCart');
Route::get('/article/{id}','ArticleView');
Route::resource('/profile','ProfileController');
Route::get('/filter/{gender}/{category}','Filtered');

Route::get('/pay/card','PayController@card')->middleware('auth');
Route::get('/pay/card/payed','PayController@payed')->middleware('auth');


Route::get('/admin', 'HomeController@index')->middleware('auth','admin');

Route::group(['middleware' => ['auth','admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('genders', 'Admin\GenderController');
    Route::resource('sizes', 'Admin\SizeController');
    Route::resource('articles', 'Admin\ArticleController');
    Route::resource('orderedArticles', 'Admin\OrderedArticleController');
    Route::resource('orderStatuses', 'Admin\OrderStatusController');
    Route::resource('orders', 'Admin\OrderController');
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('sizesArticles', 'Admin\SizesArticleController');
});