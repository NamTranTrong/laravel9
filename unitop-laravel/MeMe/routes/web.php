<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',function(){
    return view('home');
});

Route::prefix('/category')->group(function(){
    Route::get('/',[
        'as' => 'category.index',
        'uses' => 'AdminCategoryController@index',
    ]);

    Route::get('/create',[
        'as' => 'category.create',
        'uses' => 'AdminCategoryController@create',
    ]);

    Route::post('/store',[
        'as' => 'category.store',
        'uses' => 'AdminCategoryController@store',
    ]);

    Route::get('/edit/{id}',[
        'as' => 'category.edit',
        'uses' => "AdminCategoryController@edit",
    ]);

    Route::post('/update/{id}',[
        'as' => 'category.update',
        'uses' => 'AdminCategoryController@update',
    ]);

    Route::get('/delete/{id}',[
        'as' => 'category.delete',
        'uses' => 'AdminCategoryController@delete',
    ]);
});

    Route::prefix('product')->group(function(){
        Route::get('/',[
            'as' => 'product.index',
            'uses' => 'AdminProductController@index',
        ]);

        Route::get('/create',[
            'as' => 'product.create',
            'uses' => 'AdminProductController@create',
        ]);

        Route::post('/store',[
            'as' => 'product.store',
            'uses' => 'AdminProductController@store',
        ]);
    });
