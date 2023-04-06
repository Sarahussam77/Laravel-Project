<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\AddressController;

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

////////////////////////////////////////////////////////////////////////////////////
// Route::group(['middleware' => ['auth:sanctum']],function () {

// });
///////////////////////////////////////////////////////////////////////////////


//esraa

//address api
Route::get('/addresses', [AddressController::class, 'index']);
Route::get('/addresses/{address}',[AddressController::class, 'show']);
Route::post('/addresses/{address}',[AddressController::class, 'update']);
Route::post('/addresses',[AddressController::class , 'store']);
Route::delete('/addresses/{address}',[AddressController::class, 'destroy']);
//end of address api

//oder api
Route::get('/orders' , [OrderController::class , 'index']);
Route::get('/orders/{order}' , [OrderController::class , 'show']);
Route::post('/orders' , [OrderController::class , 'store']);
Route::put('/orders/{order}' , [OrderController::class , 'update']);
//end of order api

//end esraa

// Route::post('/sanctum/token', function (Request $request) {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//         'device_name' => 'required',
//     ]);

//     $user = User::where('email', $request->email)->first();

//     if (! $user || ! Hash::check($request->password, $user->password)) {
//         throw ValidationException::withMessages([
//             'email' => ['The provided credentials are incorrect.'],
//         ]);
//     }

//     return $user->createToken($request->device_name)->plainTextToken;
// });