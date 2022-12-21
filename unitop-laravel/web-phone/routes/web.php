<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;

Auth::routes();

Route::group(['namespace'=> 'Auth'],function(){
    Route::get('dang-ky','RegisterController@getRegister')->name('get.register');
    Route::post('dang-ky','RegisterController@postRegister')->name('post.register');

    Route::get('dang-nhap','LoginController@getLogin')->name('get.login');
    Route::post('dang-nhap','LoginController@postLogin')->name('post.login');

    Route::get('dang-xuat','LoginController@getLogout')->name('get.logout.user');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('danh-muc/{slug}-{id}','CategoryController@getListProduct')->name('get.list.product');
Route::get('san-pham/{slug}-{id}','ProductDetailController@productDetail')->name('get.detail.product');

Route::prefix('shopping')->group(function(){
    Route::get('/add/{id}','ShoppingCartController@addProduct')->name('add.product');
    Route::get('/delete/{id}','ShoppingCartController@deleteProduct')->name('delete.product');
    Route::get('/danh-sach','ShoppingCartController@getListShoppingCart')->name('get.list.shoppingCart');
});

Route::group(['prefix'=>'gio-hang','middleware'=>'CheckLoginUser'],function(){
    Route::get('/thanh-toan','ShoppingCartController@getFormPay')->name('get.form.pay');
    Route::post('/thanh-toan','ShoppingCartController@saveInfoShoppingCart');
});

Route::group(['prefix'=>'ajax','middleware'=>'CheckLoginUser'],function(){
    Route::post('/danh-gia/{id}','RatingController@saveRating')->name('post.rating.product');
});

Route::get('/lien-he','ContactController@getContact')->name('get.contact');
Route::post('/lien-he','ContactController@saveContact');