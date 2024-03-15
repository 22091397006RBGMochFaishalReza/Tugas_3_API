<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;

Route::prefix('api/contacts/{idContact}/addresses')->group(function () {
    Route::post('/', [AddressController::class, 'store']);
    Route::get('/', [AddressController::class, 'index']);
    Route::get('/{idAddress}', [AddressController::class, 'show']);
    Route::put('/{idAddress}', [AddressController::class, 'update']);
    Route::delete('/{idAddress}', [AddressController::class, 'destroy']);
});

use App\Http\Controllers\UserController;

Route::post('/users', [UserController::class, 'register']);
Route::post('/users/login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users/getupdate', [UserController::class, 'getUpdate']);
    Route::patch('/users/getupdate', [UserController::class, 'update']);
    Route::delete('/users/logout', [UserController::class, 'logout']);
});
