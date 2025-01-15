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
Route::prefix('/')->group(function(){

    Route::get('login',[
        'as' => 'login.index',
        'uses' => 'Controller@indexLogin',
    ]);

    Route::get('register',[
        'as' => 'register.index',
        'uses' => 'Controller@indexRegister'
    ]);

    Route::post('postLogin',[
        'as' => 'login.post',
        'uses' => 'Controller@postLogin',
    ]);

    Route::post('postRegister',[
        'as' => 'register.post',
        'uses' => 'Controller@postRegister'
    ]);

});


Route::prefix('/home')->group(function(){

    Route::get('/',[
        'as' => 'home.index',
        'uses' => 'HomeController@index',
    ]);

    Route::post('/{id}',[
        'as' => 'home.addToCart',
        'uses' => 'HomeController@addToCart'
    ]);

});


Route::prefix('/collection')->group(function(){

    Route::get('/category-{id}',[
        'as' => 'collection.get-category',
        'uses' => 'CollectionController@collectionByCategory'
    ]);

    Route::get('/{category_id}',[
        'as' => 'collection.getProductsByCategory',
        'uses' => 'CollectionController@getProductsByCategory'
    ]);

});

Route::prefix('/product-detail')->group(function(){

    Route::get('/product-{id}',[
        'as' => 'product.getProduct',
        'uses' => 'ProductController@getProduct'
    ]);

    Route::post('/add-to-cart-in-product-detail/{productId}',[
        'as' => 'product.addToCart',
        'uses' => 'ProductController@addToCartInProductDetail'
    ]);

});

Route::prefix('/blog')->group(function(){

    Route::get('/',[
        'as' => 'blog.collection',
        'uses' => 'BlogController@index'
    ]);

    Route::get('/{blogId}',[
        'as' => 'blog.detail',
        'uses' => 'BlogController@getBlog'
    ]);

});

Route::prefix('/cart')->group(function(){
    Route::post('/add-to-cart/{id}',[
        'as' => 'cart.addtoCart',
        'uses' => 'CartController@addToCart'
    ]);

    Route::post('/remove-icon-bag-cart/{id}',[
        'as' => 'cart.removeIconBagCart',
        'uses' => 'CartController@removeIconBagCart',
    ]);

    Route::get('/shopping-cart',[
        'as' => 'cart.shoppingCart',
        'uses' => 'CartController@showShoppingCart',
    ]);

    Route::post('/update-icon-shopping-cart/{id}',[
        'as' => 'cart.updateIconShoppingCart',
        'uses' => 'CartController@updateIconShoppingCart',
    ]);

    Route::post('/remove-icon-shopping-cart/{id}',[
        'as' => 'cart.removeIconShoppingCart',
        'uses' => 'CartController@removeIconShoppingCart',
    ]);
});

Route::prefix('/order')->group(function(){
    Route::get('/',[
        'as' => 'order.index',
        'uses' => 'OrderController@index',
    ]);
    Route::post('/create',[
        'as' => 'order.create',
        'uses' => 'OrderController@create',
    ]);
});

Route::prefix('/feedback')->group(function(){
    Route::post('/postFeedBack/{productId}',[
        'as' => 'feedback.postFeedBack',
        'uses' => 'FeedBackProductController@postFeedBack',
    ]);
});
