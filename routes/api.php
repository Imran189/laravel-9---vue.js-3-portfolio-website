<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::post('register',[AuthController::class,'register']);
//Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function(){
Route::post('login', 'login');
Route::post('register', 'register');
});
