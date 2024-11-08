<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//use App\Http\Controllers\usercontroller;

//Route::get ('/user',[usercontroller::class,'aboutuser']);
//Route::view('/abhi','welcome');
//Route::view('/about','about');
 //Route::view('user','home');
//Route::post('vikas',[UserNmae::class,'username']);

//Route::controller(StudentController::class)->group(function(){

//Route::middleware('nikku')->group(function(){

   //Route::get('Student',[HomeController::class,'user']);
   Route::post ('user',[UserController::class,'upload']);
  Route ::view ('user','user');

  Route ::view ('login','login');
   //Route::view('user','user');