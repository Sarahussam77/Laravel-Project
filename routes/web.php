<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AreaController;

use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\StripeController;




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

Route::middleware(['auth'])->get('/', function () {
    return view('welcome');
})->name('welcome');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('stripe', [StripeController::class, 'stripe'])->name('stripe');
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

 Route::middleware(['auth','role:pharmacy|doctor|admin'])->group(function()
{
    Route::resource('orders', OrderController::class);
    Route::get('orders/process_order/{id}',[ OrderController::class,'processOrder'])->name('orders.process');
    
    Route::get('orders/deliver_order/{id}',[ OrderController::class,'deliverOrder'])->name('orders.deliver');
    Route::get('orders/cancel_order/{id}',[ OrderController::class,'cancelOrder'])->name('orders.cancel');

});

Route::middleware(['auth','role:pharmacy|doctor|admin'])->group(function()
{
    Route::resource('medicines', MedicineController::class);
});

Route::middleware(['auth','role:pharmacy|admin'])->group(function()
{
    Route::resource('revenue', RevenueController::class);

    Route::get('doctors/ban/{id}',[DoctorController::class,'ban'])->name('doctors.ban');
});
Route::post('orders/ajaxShipping',[OrderController::class,'ajaxGetShippingAddress']);

Route::middleware(['auth','role:admin'])->group(function()
 {    
Route::resource('clients', ClientController::class);
Route::get('/pharmacies', [PharmacyController::class, 'index'])->name('pharmacies.index');
Route::get('/pharmacies/create', [PharmacyController::class,'create'])->name('pharmacies.create');
Route::post('/pharmacies', [PharmacyController::class, 'store'])->name('pharmacies.store');
Route::delete('/pharmacies/{id}', [PharmacyController::class, 'destroy'])->name('pharmacies.destroy');
Route::get('/useraddresses/create', [UserAddressController::class,'create'])->name('useraddresses.create');
Route::post('/useraddresses', [UserAddressController::class, 'store'])->name('useraddresses.store');
Route::get('/useraddresses/{useraddresses}/edit', [UserAddressController::class,'edit'])->name('useraddresses.edit');
Route::put('/useraddresses/{id}', [UserAddressController::class, 'update'])->name('useraddresses.update');
Route::delete('/useraddresses/{id}', [UserAddressController::class, 'destroy'])->name('useraddresses.destroy');
Route::get('/areas/create', [AreaController::class,'create'])->name('areas.create');
Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');
Route::get('/areas/{area}/edit', [AreaController::class,'edit'])->name('areas.edit');
Route::put('/areas/{id}', [AreaController::class, 'update'])->name('areas.update');
Route::delete('/areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');
Route::get('/readsoftdelete',[PharmacyController::class,'readsoftdelete'])->name('pharmacies.readsoft');
Route::get('{pharmacy}/restore', [PharmacyController::class,'restore'])->name('pharmacies.restore');
Route::get('{pharmacy}/forcedelete', [PharmacyController::class,'forceDelete'])->name('pharmacies.forcedelete');
Route::post('single-charge',[App\Http\Controllers\HomeController::class,'singleCharge'])->name('single.charge');
Route::get('doctors/ban/{id}',[DoctorController::class,'ban'])->name('doctors.ban');
    
});
Route::middleware(['auth','role:pharmacy|admin'])->group(function()
 {  Route::resource('revenue', RevenueController::class);
    Route::get('/doctors/create', [DoctorController::class,'create'])->name('doctors.create');
    Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');
    Route::delete('/doctors/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
    Route::get('/pharmacies/{pharmacy}', [PharmacyController::class, 'show'])->name('pharmacies.show');
Route::get('/pharmacies/{pharmacy}/edit', [PharmacyController::class,'edit'])->name('pharmacies.edit');
Route::put('/pharmacies/{id}', [PharmacyController::class, 'update'])->name('pharmacies.update');
    
});














// // Admin Route
// Route::middleware(['auth','role:admin|doctor'])->group(function()
// {
//   Route::resource('pharmacies', PharmacyController::class);
//     Route::get('/readsoftdelete',[PharmacyController::class,'readsoftdelete'])->name('pharmacies.readsoft');
//     Route::get('{pharmacy}/restore', [PharmacyController::class,'restore'])->name('pharmacies.restore');
//     Route::get('{pharmacy}/forcedelete', [PharmacyController::class,'forceDelete'])->name('pharmacies.forcedelete');
//     Route::post('single-charge',[App\Http\Controllers\HomeController::class,'singleCharge'])->name('single.charge');
//     Route::resource('clients', ClientController::class);
//     Route::resource('areas', AreaController::class);
//     Route::resource('useraddresses', UserAddressController::class);
//  });


/////////////////////////////////////////////////////////


Route::middleware(['auth','role:doctor|admin|pharmacy'])->group(function()
{   Route::get('/useraddresses', [UserAddressController::class, 'index'])->name('useraddresses.index');
    Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
    Route::get('/doctors/{doctor}', [DoctorController::class, 'show'])->name('doctors.show');
    Route::get('/doctors/{doctor}/edit', [DoctorController::class,'edit'])->name('doctors.edit');
    Route::put('/doctors/{id}', [DoctorController::class, 'update'])->name('doctors.update');
    
});
Route::middleware(['auth','role:admin|pharmacy'])->group(function()
{
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
});

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');