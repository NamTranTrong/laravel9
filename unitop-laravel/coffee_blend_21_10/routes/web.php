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

Route::get('/','HomeController@index');

Route::prefix('/collection')->group(function(){
    Route::get('/',[
        'as' => 'collection.index',
        'uses' => 'CollectionController@collection'
    ]);

    Route::get('/{category_id}',[
        'as' => 'collection.getProductsByCategory',
        'uses' => 'CollectionController@getProductsByCategory'
    ]);

});
