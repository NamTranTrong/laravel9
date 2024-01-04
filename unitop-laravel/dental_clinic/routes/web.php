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

    Route::get('/edit/{mabn}',[
        'as' => "edit.patient",
        'uses' => "AdminPatientController@edit",
    ]);

    Route::post('/update/{mabn}',[
        'as' => 'update.patient',
        'uses' => "AdminPatientController@update",
    ]);

    Route::get('/delete/{mabn}',[
        'as' => 'delete.patient',
        'uses' => "AdminPatientController@delete",
    ]);
});

Route::prefix('/contraindication')->group(function(){
    Route::get('/{mabn}',[
        'as' => "list.contraindication",
        'uses' => "AdminContraindicationController@listContraindications",
    ]);

    Route::get('/edit/{mabn}/{mathuoc}',[
        'as' => "edit.contraindication",
        'uses' => "AdminContraindicationController@editContraindication",
    ]);

    Route::post('/update/{mabn}/{mathuoc}',[
        'as' => "update.contraindication",
        'uses' => "AdminPatientController@updateContraindication",
    ]);

    Route::get('/add/{mabn}',[
        'as' => "add.contraindication",
        'uses' => "AdminContraindicationController@addContraindication",
    ]);

    Route::post('/store/{mabn}',[
        'as' => "store.contraindication",
        'uses' => "AdminContraindicationController@storeContraindication",
    ]);

    Route::get('/delete/{mabn}/{mathuoc}',[
        'as' => "delete.contraindication",
        'uses' => "AdminContraindicationController@deleteContraindication",
    ]);
});

Route::prefix('/status')->group(function(){
    Route::get('/{makh}',[
        'as' => "list.status",
        'uses' => "AdminStatusController@index",
    ]);

    Route::get('/edit/{makh}/{stt}',[
        'as' => "edit.status",
        'uses' => "AdminStatusController@edit",
    ]);

    Route::post('/update/{makh}/{stt}',[
        'as' => "update.status",
        'uses' => "AdminStatusController@update",
    ]);

});

Route::prefix('/plan')->group(function(){
    Route::get('/{mabn}',[
        'as' => "list.plan",
        'uses' => "AdminPlanController@index",
    ]);

    Route::get('/add/{mabn}',[
        'as' => "add.plan",
        'uses' => "AdminPlanController@add",
    ]);

    Route::post('/store/{mabn}',[
        'as' => "store.plan",
        'uses' => "AdminPlanController@store",
    ]);

    Route::get('/edit/{makh}',[
        'as' => "edit.plan",
        'uses' => "AdminPlanController@edit",
    ]);

    Route::post('/update/{makh}',[
        'as' => "update.plan",
        'uses' => "AdminPlanController@update",
    ]);
});

Route::prefix('/prescription')->group(function(){
    Route::get('/{makh}',[
        'as' => "list.prescription",
        'uses' => "AdminPrescriptionController@index",
    ]);

    Route::get('/add/{makh}',[
        'as' => "add.prescription",
        'uses' => "AdminPrescriptionController@add",
    ]);

    Route::post('/store/{makh}',[
        'as' => "store.prescription",
        'uses' => "AdminPrescriptionController@store",
    ]);

    Route::get('/edit/{makh}/{mathuoc}',[
        'as' => "edit.prescription",
        'uses' => "AdminPrescriptionController@edit",
    ]);

    Route::post('/update/{makh}/{mathuoc}',[
        'as' => "update.prescription",
        'uses' => "AdminPrescriptionController@update",
    ]);

    Route::get('/delete/{makh}/{mathuoc}',[
        'as' => "delete.prescription",
        'uses' => "AdminPrescriptionController@delete",
    ]);
});

Route::prefix('/medicine')->group(function(){
    Route::get('/',[
        'as' => "list.medicine",
        'uses' => "AdminMedicineController@index",
    ]);
});

Route::prefix('/staff')->group(function(){
    Route::get('/',[
        'as' => "list.staff",
        'uses' => "AdminStaffController@index",
    ]);
});

Route::prefix('/dentist')->group(function(){
    Route::get('/',[
        'as' => "list.dentist",
        'uses' => "AdminDentistController@index",
    ]);
});

Route::prefix('/schedule')->group(function(){
    Route::get('/{mans}',[
        'as' => "list.schedule",
        'uses' => "AdminScheduleController@index",
    ]);
});

Route::prefix('/apointment')->group(function(){
    Route::get('/',[
        'as' => "list.apointment",
        'uses' => "AdminApointmentController@index",
    ]);

    Route::get('/delete/{mach}',[
        'as' => "delete.apointment",
        'uses' => "AdminApointmentController@delete",
    ]);
});


Route::prefix('/payment')->group(function(){
    Route::get('/',[
        'as' => "list.paymentInfo",
        'uses' => "AdminPaymentInfoController@index",
    ]);

    Route::get('/delete/{mach}',[
        'as' => "delete.apointment",
        'uses' => "AdminApointmentController@delete",
    ]);
});
