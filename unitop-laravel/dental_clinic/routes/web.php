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

Route::prefix('/patient')->group(function(){
    Route::get('/',[
        'as' => "list.patient",
        'uses' => "AdminPatientController@index",
    ]);

    Route::get('/add',[
        'as' => "add.patient",
        'uses' => "AdminPatientController@add",
    ]);

    Route::post('/store',[
        'as' => 'store.patient',
        'uses' => "AdminPatientController@store",
    ]);

    Route::get('/delete/{mabn}',[
        'as' => 'delete.patient',
        'uses' => "AdminPatientController@delete",
    ]);
});
