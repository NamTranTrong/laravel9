<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');

    Route::group(['prefix'=> 'category'],function(){

        Route::get('/','AdminCategoryController@index')->name('admin.get.list.category');

        Route::get('/create','AdminCategoryController@create')->name('admin.get.list.create.category');

        Route::post('/create','AdminCategoryController@store');

        Route::get('/update/{id}','AdminCategoryController@edit')->name('admin.get.edit.category');

        Route::post('/update/{id}','AdminCategoryController@update');

        Route::get('/{action}/{id}','AdminCategoryController@action')->name('admin.get.action.category');
    });

    Route::group(['prefix'=> 'product'],function(){

        Route::get('/','AdminProductController@index')->name('admin.get.list.product');

        Route::get('/create','AdminProductController@create')->name('admin.get.list.create.product');

        Route::post('/create','AdminProductController@store');

        Route::get('/update/{id}','AdminProductController@edit')->name('admin.get.edit.product');

        Route::post('/update/{id}','AdminProductController@update');

        Route::get('/{action}/{id}','AdminProductController@action')->name('admin.get.action.product');
    });

    Route::group(['prefix'=> 'article'],function(){

        Route::get('/','AdminArticleController@index')->name('admin.get.list.article');

        Route::get('/create','AdminArticleController@create')->name('admin.get.list.create.article');

        Route::post('/create','AdminArticleController@store');

        Route::get('/update/{id}','AdminArticleController@edit')->name('admin.get.edit.article');

        Route::post('/update/{id}','AdminArticleController@update');

        Route::get('/{action}/{id}','AdminArticleController@action')->name('admin.get.action.article');
    });
    //ql đơn hàng
    Route::group(['prefix'=> 'transaction'],function(){
        Route::get('/','AdminTransactionController@index')->name('admin.get.list.transaction');
        Route::get('/chi-tiet-don-hang/{id}','AdminTransactionController@viewOrder')->name('admin.get.view.order');
    });

    Route::group(['prefix'=> 'user'],function(){

        Route::get('/','AdminUserController@index')->name('admin.get.list.user');
    });

    
    Route::group(['prefix'=> 'rating'],function(){

        Route::get('/','AdminRatingController@index')->name('admin.get.list.rating');
    });

    Route::group(['prefix'=> 'contact'],function(){

        Route::get('/','AdminContactController@index')->name('admin.get.list.contact');
        Route::get('/{action}/{id}','AdminContactController@action')->name('admin.get.action.contact');
    });
});
