<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\Apipassportcontroller;
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

//pretected
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');      // ->middleware('guard');
//

Route::get('/', function () {
    return view('welcome');
});
//relashionship.........route
Route::get("add_customer",[CustomerController::class,'add_customer']);
// save data show route ... 
Route::get("show_mobile/{id}",[CustomerController::class,'show_mobile']); 
//database save data retrive route..... (mobilecontroller)   
Route::get("show_customer/{id}",[MobileController::class,'show_customer']); 
// one to many route..... 
Route::get("add_author",[CustomerController::class,'add_author']);
Route::get("add_post/{id}",[CustomerController::class,'add_post']);
//get data in database
Route::get("show_post/{id}",[CustomerController::class,'show_post']); 
//get author base post id....
Route::get("show_author/{id}",[CustomerController::class,'show_author']); 
//Many to Many route
Route::get("add_song",[CustomerController::class,'add_song']);
Route::get("add_singer",[CustomerController::class,'add_singer']);
Route::get("show_song/{id}",[CustomerController::class,'show_song']); 
Route::post('/register',[Apipassportcontroller::class,'register']);
Auth::routes();

//job and queue route......

Route::get('/hello', function () {
    // dispatch(job: new \App\jobs\sendTestMailjob())->delay(now()->addSeconds(value:5));
    sendTestMailjob::dispatch()->delay(now()->addSeconds(value:5));
    return view('home');
});

// route middleware.........
// Route::get('no-access',function(){
//    echo "YOU'RE NOT TO ACCESS THE PAGE";
//    die;
// });