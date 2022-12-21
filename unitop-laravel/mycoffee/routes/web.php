<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('danh-muc/{slug}-{id}','CategoryController@getListProduct')->name('get.list.product');
Route::get('/san-pham/{slug}-{id}','ProductDetailController@getDetailProduct')->name('get.detail.product');

Route::prefix('shopping')->group(function(){
    Route::get('/add/{id}','ShoppingCartController@addProduct')->name('add.product');
});



Auth::routes();

Route::group(['namespace' => 'Auth'],function(){
    Route::get('dang-ky','RegisterController@getRegister')->name('get.register');
    Route::post('dang-ky','RegisterController@postRegister');
    Route::get('/dang-nhap','LoginController@getLogin')->name('get.login');
    Route::post('/dang-nhap','LoginController@postLogin');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
