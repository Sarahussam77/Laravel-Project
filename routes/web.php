<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AreaController;

use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RevenueController;




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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('single-charge',[App\Http\Controllers\HomeController::class,'singleCharge'])->name('single.charge');

Route::middleware(['auth','order-role'])->group(function()
{
    Route::resource('orders', OrderController::class);
});

// doctor Route
// Route::middleware(['auth','user-role:doctor'])->group(function()
// {
//     // Route::resource('orders', OrderController::class);
// });

// Admin Route
Route::middleware(['auth','role:admin'])->group(function()
{
    Route::resource('pharmacies', PharmacyController::class);
    Route::get('/readsoftdelete',[PharmacyController::class,'readsoftdelete'])->name('pharmacies.readsoft');
    Route::get('{pharmacy}/restore', [PharmacyController::class,'restore'])->name('pharmacies.restore');
    Route::get('{pharmacy}/forcedelete', [PharmacyController::class,'forceDelete'])->name('pharmacies.forcedelete');
    
    Route::resource('doctors', DoctorController::class);
    Route::resource('users', UserController::class);
    Route::resource('areas', AreaController::class);
    
    Route::resource('useraddresses', UserAddressController::class);
    Route::resource('medicines', MedicineController::class);
    // Route::resource('orders', OrderController::class);
    Route::resource('revenue', RevenueController::class);
});