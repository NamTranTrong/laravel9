<?php

use App\Http\Controllers\HomeController;
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


Route::get('/home','HomeController@index');

Route::prefix('/product')->group(function () {
    Route::get('/category/{slug}/{id}',[
        'as'=> 'product.list',
        'uses' => 'ProductController@index',
    ]);
});
