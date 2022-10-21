<?php

use App\Http\Controllers\API\AboutController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\SkillsController;
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

Route::controller(AboutController::class)->group(function(){
Route::get('edit_about','edit_about');
Route::post('update_about/{id}','update_about');
});

Route::controller(ServiceController::class)->group(function(){
Route::get('get_all_service','get_all_service');
Route::post('create_service','create_service');
Route::post('/update_service/{id}','update_service');
Route::get('/delete_service/{id}','delete_service');
});
Route::controller(SkillsController::class)->group(function(){
Route::get('get_all_skills','get_all_skills');
});