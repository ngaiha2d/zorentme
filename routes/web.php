<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\vendorcontroller;


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
Route::get('/workshop',[AuthController::class, "workshop"]);
Route::get('/workshoptable', [AuthController::class,"workshop2"]);
//Route::view('/work1', "workshop2");

Route::get('/login',[AuthController::class, "loadlogin"]);
Route::post('/login',[AuthController::class, "userLogin"])->name('userLogin');

Route::get('/Register',[AuthController::class, "loadRegister"]);
Route::post('/Register',[AuthController::class, "userRegister"])->name('userRegister');



Route::get('/', [Authcontroller::class, "homepage"]);

Route::get('/header',[Authcontroller::class, "header"]);

Route::get('/logout',[AuthController::class, "logout"]);

Route::group(['middleware'=>['web','checkAdmin']],function(){

//for the admin route
//Route for admin here 

});

Route::group(['middleware'=>['web','chechUser']],function(){

    //Route for the users here


});

Route::group(['middleware'=>['web','checkVendor']],function(){

    //Route for the vendor here

 Route::get('/vendor',[vendorController::class, "vendor"]);


});




//test register page
Route::get('/reg',function(){
    return view('/registerededitted');
    });





// Route::get('/', function () {
//     return view('welcome');
// });
