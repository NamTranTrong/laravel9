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

Route::get('/admin','AdminController@loginAdmin');

Route::post('/admin','AdminController@postLoginAdmin');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function(){
    Route::prefix('categories')->group(function(){

        Route::get('/',[
            'as' => 'category.index',
            'uses' => 'CategoryController@index'
        ]);
    
        Route::get('/create',[
            'as' => 'category.create',
            'uses' => 'CategoryController@create'
        ]);
    
        Route::post('/store',[
            'as' => 'category.store',
            'uses' => 'CategoryController@store'
        ]);
    
        Route::get('/edit/{id}',[
            'as' => 'category.edit',
            'uses' => 'CategoryController@edit',
        ]);
    
        Route::post('/update/{id}',[
            'as' => 'category.update',
            'uses' => 'CategoryController@update',
        ]);
    
        Route::get('/delete/{id}',[
            'as' => 'category.delete',
            'uses' => 'CategoryController@delete',
        ]);
    });

    Route::prefix('menus')->group(function(){
    
        Route::get('/',[
            'as' => 'menu.index',
            'uses' => 'MenuController@index',
        ]);
    
        Route::get('/add',[
            'as' => 'menu.create',
            'uses' => 'MenuController@create'
        ]);
    
        Route::post('/store',[
            'as' => 'menu.store',
            'uses' => 'MenuController@store',
        ]);
    
        Route::get('/edit/{id}',[
            'as' => 'menu.edit',
            'uses' => 'MenuController@edit',
        ]);
    
        Route::post('/update/{id}',[
            'as' => 'menu.update',
            'uses' => 'MenuController@update',
        ]);
    
        Route::get('/delete/{id}',[
            'as' => 'menu.delete',
            'uses' => 'MenuController@delete',
        ]);
    
    
    
    
    });

    Route::prefix('/product')->group(function(){
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

        Route::get('/edit/{id}',[
            'as' => 'product.edit',
            'uses' =>'AdminProductController@edit',
        ]);

        Route::post('/update/{id}',[
            'as' => 'product.update',
            'uses' => 'AdminProductController@update',
        ]);

        Route::get('/delete/{id}',[
            'as' => 'product.delete',
            'uses' => 'AdminProductController@delete',
        ]);
    });


});


