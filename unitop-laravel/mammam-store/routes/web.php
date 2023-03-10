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

Route::get('/login','AdminController@loginAdmin');

Route::post('/login','AdminController@postLoginAdmin');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

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
