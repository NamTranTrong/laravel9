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

Route::get('/admin','AdminController@loginAdmin');

Route::post('/admin','AdminController@postLoginAdmin');


Route::get('/home',function(){
    return view('home');
});

Route::prefix('/category')->group(function(){
    Route::get('/',[
        'as' => 'category.index',
        'uses' => 'AdminCategoryController@index',
        'middleware' => 'can:list-category',
    ]);

    Route::get('/create',[
        'as' => 'category.create',
        'uses' => 'AdminCategoryController@create',
        'middleware' => "can:add-category"
    ]);

    Route::post('/store',[
        'as' => 'category.store',
        'uses' => 'AdminCategoryController@store',
    ]);

    Route::get('/edit/{id}',[
        'as' => 'category.edit',
        'uses' => "AdminCategoryController@edit",
        'middleware' => "can:edit-category",
    ]);

    Route::post('/update/{id}',[
        'as' => 'category.update',
        'uses' => 'AdminCategoryController@update',
    ]);

    Route::get('/delete/{id}',[
        'as' => 'category.delete',
        'uses' => 'AdminCategoryController@delete',
        'middleware' => 'can:delete-category'
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
        'uses' => 'AdminProductController@edit',
        'middleware' => 'can:edit-product,id',
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

Route::prefix('/role')->group(function(){
    route::get('/',[
        'as' => 'role.index',
        'uses' => 'AdminRoleController@index',
    ]);

    Route::get('/create',[
        'as' => 'role.create',
        'uses' => 'AdminRoleController@create',
    ]);

    Route::post('/store',[
        'as' => 'role.store',
        'uses' => 'AdminRoleController@store',
    ]);

    Route::get('/edit/{id}',[
        'as' => 'role.edit',
        'uses' => 'AdminRoleController@edit',
    ]);

    Route::post('/update/{id}',[
        'as' => 'role.update',
        'uses' => 'AdminRoleController@update',
    ]);

    Route::get('/delete/{id}',[
        'as' => 'role.delete',
        'uses' => 'AdminRoleController@delete',
    ]);
});

Route::prefix('/user')->group(function(){
    Route::get('/',[
        'as' => 'user.index',
        'uses' => 'AdminUserController@index',
    ]);

    Route::get('/create',[
        'as' => 'user.create',
        'uses' => 'AdminUserController@create',
    ]);

    Route::post('/store',[
        'as' => 'user.store',
        'uses' => 'AdminUserController@store',
    ]);

    Route::get('/edit/{id}',[
        'as' => 'user.edit',
        'uses' => 'AdminUserController@edit',
    ]);

    Route::post('/update/{id}',[
        'as' => 'user.update',
        'uses' => 'AdminUserController@update',
    ]);

    Route::get('/delete/{id}',[
        'as' => 'user.delete',
        'uses' => 'AdminUserController@delete',
    ]);
});

Route::prefix('/permission')->group(function(){
    Route::get('/',[
        'as' => 'permission.index',
        'uses' => 'AdminPermissionController@index',
    ]);
    Route::get('/create',[
        'as' => 'permission.create',
        'uses' => 'AdminPermissionController@create',
    ]);
    Route::post('/store',[
        'as' => 'permission.store',
        'uses' => 'AdminPermissionController@store',
    ]);
    Route::get('/edit/{id}',[
        'as' => 'permission.edit',
        'uses' => 'AdminPermissionController@edit',
    ]);
    Route::post('/update/{id}',[
        'as' => 'permission.update',
        'uses' => 'AdminPermissionController@update',
    ]);

    Route::get('/delete/{id}',[
            'as' => 'permission.delete',
            'uses' => 'AdminPermissionController@delete',
    ]);
    
});