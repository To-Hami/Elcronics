<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum','Admin'])
    ->group(function (){
        // auth routes
        Route::get('/user', [\App\Http\Controllers\AuthController::class , 'getUser']);
        Route::post('/logout', [\App\Http\Controllers\AuthController::class , 'logout'])->name('logout');
        //product routes
        Route::apiResource('/product', \App\Http\Controllers\ProductController::class);



    });

Route::post('/login', [\App\Http\Controllers\AuthController::class , 'login'])->name('login');



