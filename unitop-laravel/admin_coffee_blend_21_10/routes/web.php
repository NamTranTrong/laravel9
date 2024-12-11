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
Route::get('admin/login', [
    'as' => 'login',
    'uses' => 'AdminController@login'
]);

Route::post('admin/postLogin',[
    'as' => 'postLogin',
    'uses' => 'AdminController@postLogin'
]);

Route::post('admin/postRegister',[
    'as' => 'postRegister',
    'uses' => 'AdminController@postRegister'
]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::prefix('/admin')->group(function(){
    Route::prefix('/category')->group(function(){
        Route::get('/',[
            'as' => 'category.index',
            'uses' => "AdminCategoryController@index",
        ]);
    
    
        Route::get('/create',[
            'as' => 'category.add',
            'uses' => "AdminCategoryController@add",
        ]);
    
        Route::post('/store',[
            'as' => "category.store",
            'uses' => "AdminCategoryController@store",
        ]);
    
        Route::get('/edit/{id}',[
            'as' => 'category.edit',
            'uses' => "AdminCategoryController@edit",
        ]);
    
        Route::post('/update/{id}',[
            'as' => 'category.update',
            'uses' => "AdminCategoryController@update",
        ]);
    
        Route::get('/delete/{id}',[
            'as' => 'category.delete',
            'uses' => "AdminCategoryController@delete",
        ]);
    
        Route::post('/delete-multiple',[
            'as' => 'category.deleteMultiple',
            'uses' => "AdminCategoryController@deleteMultiple",
        ]);
    
        Route::get('/search',[
            'as' => 'category.search',
            'uses' => 'AdminCategoryController@search',
        ]);
    
    });
    
    Route::prefix('/menu')->group(function(){
        Route::get('/',[
            'as' => 'menu.index',
            'uses' => "AdminMenuController@index",
        ]);
    
    
        Route::get('/create',[
            'as' => 'menu.add',
            'uses' => "AdminMenuController@add",
        ]);
    
        Route::post('/store',[
            'as' => "menu.store",
            'uses' => "AdminMenuController@store",
        ]);
    
        Route::get('/edit/{id}',[
            'as' => 'menu.edit',
            'uses' => "AdminMenuController@edit",
        ]);
    
        Route::post('/update/{id}',[
            'as' => 'menu.update',
            'uses' => "AdminMenuController@update",
        ]);
    
        Route::get('/delete/{id}',[
            'as' => 'menu.delete',
            'uses' => "AdminMenuController@delete",
        ]);
    
    });

    Route::prefix('/product')->group(function(){
        Route::get('/',[
            'as' => 'product.index',
            'uses' => "AdminProductController@index",
        ]);
    
    
        Route::get('/create',[
            'as' => 'product.add',
            'uses' => "AdminProductController@add",
        ]);
    
        Route::post('/store',[
            'as' => "product.store",
            'uses' => "AdminProductController@store",
        ]);
    
        Route::get('/edit/{id}',[
            'as' => 'product.edit',
            'uses' => "AdminProductController@edit",
        ]);
    
        Route::post('/update/{id}',[
            'as' => 'product.update',
            'uses' => "AdminProductController@update",
        ]);
    
        Route::get('/delete/{id}',[
            'as' => 'product.delete',
            'uses' => "AdminProductController@delete",
        ]);
    
        Route::post('/delete-multiple',[
            'as' => 'product.deleteMultiple',
            'uses' => "AdminProductController@deleteMultiple",
        ]);
    
        Route::get('/search',[
            'as' => 'product.search',
            'uses' => 'AdminProductController@search',
        ]);
    
    });

    Route::prefix('/slider')->group(function(){
        Route::get('/',[
            'as' => 'slider.index',
            'uses' => "AdminSliderController@index",
        ]);
    
    
        Route::get('/create',[
            'as' => 'slider.add',
            'uses' => "AdminSliderController@add",
        ]);
    
        Route::post('/store',[
            'as' => "slider.store",
            'uses' => "AdminSliderController@store",
        ]);
    
        Route::get('/edit/{id}',[
            'as' => 'slider.edit',
            'uses' => "AdminSliderController@edit",
        ]);
    
        Route::post('/update/{id}',[
            'as' => 'slider.update',
            'uses' => "AdminSliderController@update",
        ]);
    
        Route::get('/delete/{id}',[
            'as' => 'slider.delete',
            'uses' => "AdminSliderController@delete",
        ]);
    
    });

    Route::prefix('/setting')->group(function(){
        Route::get('/',[
            'as' => 'setting.index',
            'uses' => "AdminSettingController@index",
        ]);
    
    
        Route::get('/create',[
            'as' => 'setting.add',
            'uses' => "AdminSettingController@add",
        ]);
    
        Route::post('/store',[
            'as' => "setting.store",
            'uses' => "AdminSettingController@store",
        ]);
    
        Route::get('/edit/{id}',[
            'as' => 'setting.edit',
            'uses' => "AdminSettingController@edit",
        ]);
    
        Route::post('/update/{id}',[
            'as' => 'setting.update',
            'uses' => "AdminSettingController@update",
        ]);
    
        Route::get('/delete/{id}',[
            'as' => 'setting.delete',
            'uses' => "AdminSettingController@delete",
        ]);
    
    });

    Route::prefix('/user')->group(function(){
        Route::get('/index',[
            'as' => 'user.index',
            'uses' => 'AdminUserController@index',
        ]); 

        Route::get('/create',[
            'as' => 'user.add',
            'uses' => "AdminUserController@add",
        ]);
    
        Route::post('/store',[
            'as' => "user.store",
            'uses' => "AdminUserController@store",
        ]);
    
        Route::get('/edit/{id}',[
            'as' => 'user.edit',
            'uses' => "AdminUserController@edit",
        ]);
    
        Route::post('/update/{id}',[
            'as' => 'user.update',
            'uses' => "AdminUserController@update",
        ]);
    
        Route::get('/delete/{id}',[
            'as' => 'user.delete',
            'uses' => "AdminUserController@delete",
        ]);
    });

    Route::prefix('/role')->group(function(){
        Route::get('/index',[
            'as' => 'role.index',
            'uses' => 'AdminRoleController@index',
        ]); 

        Route::get('/create',[
            'as' => 'role.add',
            'uses' => "AdminRoleController@add",
        ]);
    
        Route::post('/store',[
            'as' => "role.store",
            'uses' => "AdminRoleController@store",
        ]);
    
        Route::get('/edit/{id}',[
            'as' => 'role.edit',
            'uses' => "AdminRoleController@edit",
        ]);
    
        Route::post('/update/{id}',[
            'as' => 'role.update',
            'uses' => "AdminRoleController@update",
        ]);
    
        Route::get('/delete/{id}',[
            'as' => 'role.delete',
            'uses' => "AdminRoleController@delete",
        ]);
    });
});

