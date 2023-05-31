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
        'uses' => 'CategoryController@index',
    ]);

    Route::get('/create',[
        'as' => 'category.create',
        'uses' => 'CategoryController@create',
    ]);

    Route::post('/store',[
        'as' => 'category.store',
        'uses' => 'CategoryController@store',
    ]);

    Route::get('/edit/{id}',[
        'as' => 'category.edit',
        'uses' => "CategoryController@edit",
    ]);
});
