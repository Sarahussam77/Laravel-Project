<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\OrderController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::post('/login','App\Http\Controllers\ApiController@login');

Route::post('/users', [UserController::class,'store']);

//client api

Route::middleware('auth:sanctum')->group(function()
{
    Route::get('/clients', [ClientController::class, 'index']);
    Route::get('/clients/{client}',[ClientController::class, 'show']);
    Route::post('/clients/{client}',[ClientController::class, 'update']);
    Route::delete('/clients/{client}',[ClientController::class, 'destroy']);
});
Route::post('/register',[ClientController::class , 'register']);
Route::post('/login', [ClientController::class,'login']);
//end of client api




//esraa

//address api
Route::get('/addresses', [AddressController::class, 'index']);
Route::get('/addresses/{address}',[AddressController::class, 'show']);
Route::post('/addresses/{address}',[AddressController::class, 'update']);
Route::post('/addresses',[AddressController::class , 'store']);
Route::delete('/addresses/{address}',[AddressController::class, 'destroy']);
//end of address api


//order api
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{order}',[OrderController::class, 'show']);
// Route::post('/addresses/{address}',[OrderController::class, 'update']);
Route::post('/orders',[OrderController::class , 'store']);
// Route::delete('/addresses/{address}',[OrderController::class, 'destroy']);
//end of order api

