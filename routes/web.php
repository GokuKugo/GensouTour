<?php

use App\Http\Controllers\GensouController;
use App\Http\Controllers\userController;
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

/*Route::get('/', function () {
    return view('index');
});*/

Route::controller(GensouController::class)->group(function () {
    Route::get('/', 'Cindex');

    Route::post('/', 'newsletter')->name('/');

    Route::get('/artists/{idbands}', 'Cartists');
    Route::get('/tours/{idlocations}', 'Ctours');
    Route::get('/shop', 'Cshop');
});

Route::controller(userController::class)->group(function () {
    Route::get('/contact', 'Ccontactin');
    Route::post('/contact', 'Ccontact');
    Route::get('success','Csuccess');

    Route::view('register','register');
    Route::post('/register','Cregister');

    Route::view('login','login');
    Route::post('/login','Clogin');

    Route::get('/profile','Cmypage');
    Route::post('/tours/{idlocations}', 'CTickGet');

    Route::get('reset-password','Cresetpasswordprw');
    Route::post('/reset-password','Cresetpassword');


    Route::get('logout','Clogout');

    Route::get('delete','Cdeleteprw');
    Route::post('/delete','Cdelete');
    Route::get('/download/{file}', 'Cdownload');

});

