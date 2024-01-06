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

Route::get('/login','AdminController@loginUser')->name('user.login');

Route::post('/login','AdminController@postLoginUser');

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
        'middleware' => 'can:add-plan',
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

    Route::get('/add',[
        'as' => "add.medicine",
        'uses' => "AdminMedicineController@add",
        'middleware' => 'can:add-medicine'
    ]);

    Route::post('/store',[
        'as' => "store.medicine",
        'uses' => "AdminMedicineController@store",
    ]);

    Route::get('/edit/{mathuoc}',[
        'as' => "edit.medicine",
        'uses' => "AdminMedicineController@edit",
        'middleware' => 'can:edit-medicine'
    ]);

    Route::post('/update/{mathuoc}',[
        'as' => "update.medicine",
        'uses' => "AdminMedicineController@update",
    ]);
});

Route::prefix('/staff')->group(function(){
    Route::get('/',[
        'as' => "list.staff",
        'uses' => "AdminStaffController@index",
    ]);

    Route::get('/add',[
        'as' => "add.staff",
        'uses' => "AdminStaffController@add",
        'middleware' => 'can:add-staff',
    ]);

    Route::post('/store',[
        'as' => "store.staff",
        'uses' => "AdminStaffController@store",
    ]);

    Route::get('/edit/{manv}',[
        'as' => "edit.staff",
        'uses' => "AdminStaffController@edit",
        'middleware' => 'can:edit-staff',
    ]);

    Route::post('/update/{manv}',[
        'as' => "update.staff",
        'uses' => "AdminStaffController@update",
    ]);
});

Route::prefix('/dentist')->group(function(){
    Route::get('/',[
        'as' => "list.dentist",
        'uses' => "AdminDentistController@index",
    ]);

    Route::get('/add',[
        'as' => "add.dentist",
        'uses' => "AdminDentistController@add",
        'middleware' => "can:add-dentist",
    ]);

    Route::post('/store',[
        'as' => "store.dentist",
        'uses' => "AdminDentistController@store",
    ]);

    Route::get('/edit/{mans}',[
        'as' => "edit.dentist",
        'uses' => "AdminDentistController@edit",
        'middleware' => "can:edit-dentist",
    ]);

    Route::post('/update/{mans}',[
        'as' => "update.dentist",
        'uses' => "AdminDentistController@update",
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
        'middleware' => 'can:list-apointment'
    ]);

    Route::get('/delete/{mach}',[
        'as' => "delete.apointment",
        'uses' => "AdminApointmentController@delete",
        'middleware' => 'can:delete-apointment'
    ]);
});


Route::prefix('/payment')->group(function(){
    Route::get('/',[
        'as' => "list.paymentInfo",
        'uses' => "AdminPaymentInfoController@index",
        'middleware' => "can:list-paymentinfo",
    ]);

    Route::get('/delete/{mach}',[
        'as' => "delete.apointment",
        'uses' => "AdminApointmentController@delete",
    ]);
});
