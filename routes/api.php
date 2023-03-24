<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Devicecontroller;
use App\Http\Controllers\insertdatacontroller;
use App\Http\Controllers\Clientcontroller;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\Apipassportcontroller;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Authantication sanctum...... 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


//get data route in data table
Route::get("list/{id}",[Devicecontroller::class,'list']);

//id vice show to data in data table route
Route::get("iddata/{id}",[Devicecontroller::class,'iddata']);
//user can any id check........route
Route::get("data/{id?}",[Devicecontroller::class,'data']);
// post to data in data table in route
Route::post("most",[insertdatacontroller::class,'addaccount']);
// Name throw search data in data base
Route::get("searchdata/{bankname}",[Devicecontroller::class,'search']);
// delete data in database
Route::delete("delete/{id}",[Devicecontroller::class,'Delete']);
//validation route........
Route::post("validate",[Devicecontroller::class,'validation']);
// resource perform ........
Route::resource("clientlist",Clientcontroller::class);
});
//public route
Route::post("Login",[Usercontroller::class,'index']);



//one to one relationship route...(customercontroller)
Route::get("add_customer",[CustomerController::class,'add_customer']);
// save data show route ... 
Route::get("show_mobile/{id}",[CustomerController::class,'show_mobile']); 
//database save data retrive route..... (mobilecontroller)   
Route::get("show_customer/{id}",[MobileController::class,'show_customer']); 

// one to many relationship route........(customercontroller) 
Route::get("add_author",[CustomerController::class,'add_author']);
Route::get("add_post/{id}",[CustomerController::class,'add_post']);
//get data in database
Route::get("show_post/{id}",[CustomerController::class,'show_post']); 
//get author base post id....
Route::get("show_author/{id}",[CustomerController::class,'show_author']); 


// has one through relationship route...(customercontroller)
Route::get("add_mechanic",[CustomerController::class,'add_mechanic']); 
Route::get("add_car/{id}",[CustomerController::class,'add_car']); 
Route::get("add_owner/{id}",[CustomerController::class,'add_owner']);
//get data  
Route::get("show_owner/{id}",[CustomerController::class,'show_owner']); 

//Many to Many route
Route::get("add_song",[CustomerController::class,'add_song']);
Route::get("add_singer",[CustomerController::class,'add_singer']);
Route::get("show_song/{id}",[CustomerController::class,'show_song']); 
Route::get("show_singer/{id}",[CustomerController::class,'show_singer']); 




//passport perform .....
Route::post('/register',[Apipassportcontroller::class,'register']);