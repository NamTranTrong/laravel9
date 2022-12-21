<?php

use Modules\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;    

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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');

    Route::prefix('category')->group(function() {
        Route::get('/', 'AdminCategoryController@index')->name('admin.get.list.category');
        Route::get('/create','AdminCategoryController@create')->name('admin.get.create.category');
        Route::post('/create', 'AdminCategoryController@store');
    });

    Route::prefix('menu')->group(function() {
        Route::get('/', 'AdminMenuController@index')->name('admin.get.list.menu');
        Route::get('/create','AdminMenuController@create')->name('admin.get.create.menu');
        Route::post('/create', 'AdminMenuController@store');
        Route::get('/update/{id}','AdminMenuController@edit')->name('admin.get.edit.menu');
        Route::post('/update/{id}', 'AdminMenuController@update');
        Route::get('/{action}/{id}', 'AdminMenuController@action')->name('admin.get.action.menu');
    });

    Route::prefix('category')->group(function() {
        Route::get('/','AdminCategoryController@index')->name('admin.get.list.category');
        Route::get('/create','AdminCategoryController@create')->name('admin.get.create.category');
        Route::post('/create', 'AdminCategoryController@store');
        Route::get('/update/{id}','AdminCategoryController@edit')->name('admin.get.edit.category');
        Route::post('/update/{id}', 'AdminCategoryController@update');
        Route::get('/{action}/{id}', 'AdminCategoryController@action')->name('admin.get.action.category');
    });

    Route::prefix('product')->group(function() {
        Route::get('/','AdminProductController@index')->name('admin.get.list.product');
        Route::get('/create','AdminProductController@create')->name('admin.get.create.product');
        Route::post('/create','AdminProductController@store');
        Route::get('/edit/{id}','AdminProductController@edit')->name('admin.get.edit.product');
        Route::post('/edit/{id}','AdminProductController@update');
        Route::get('/{action}/{id}','AdminProductController@action')->name('admin.get.action.product');
    });

    Route::prefix('article')->group(function() {
        Route::get('/','AdminArticleController@index')->name('admin.get.list.article');
        Route::get('/create','AdminArticleController@create')->name('admin.get.create.article');
        Route::post('/create','AdminArticleController@store');
        Route::get('/edit/{id}','AdminArticleController@edit')->name('admin.get.edit.article');
        Route::post('/edit/{id}','AdminArticleController@update');
        Route::get('/{action}/{id}', 'AdminArticleController@action')->name('admin.get.action.article');
    });

});

