<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\RoomsController;



Route::group(['prefix' => 'v1'], function() {
    Route::post('/login' , [LoginController::class , 'login'] );
    Route::post('/register' , [RegisterController::class , 'register'] );
    Route::get('/rooms' , [RoomsController::class , 'index'] );
    Route::get('/rooms/{room}' , [RoomsController::class , 'show'] );
    

    Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::post('/rooms/{room}/reserve' , [RoomsController::class , 'reserve'] );
    });
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
