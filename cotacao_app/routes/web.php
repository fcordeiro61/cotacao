<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\QuotationController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('dashboard');
    //})->middleware(['auth', 'verified'])->name('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user', [UserController::class, 'index'])->name('user.list');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::post('/users/{id}/deactivate', [UserController::class, 'deactivate'])->name('user.deactivate');
    Route::post('/users/{id}/activate', [UserController::class, 'activate'])->name('user.activate');

    //Customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.list');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::post('/customer/{id}/deactivate', [CustomerController::class, 'deactivate'])->name('customer.deactivate');
    Route::post('/customer/{id}/activate', [CustomerController::class, 'activate'])->name('customer.activate');

    // Quotation
    Route::get('/quotation', [QuotationController::class, 'index'])->name('quotation.list');
    Route::get('/quotation/create/{CustomerId}', [QuotationController::class, 'create'])->name('quotation.create');
    Route::post('/quotation', [QuotationController::class, 'store'])->name('quotation.store');
    Route::get('/quotation/{id}', [QuotationController::class, 'edit'])->name('quotation.edit');
    Route::put('/quotation/{id}', [QuotationController::class, 'update'])->name('quotation.update');
    Route::post('/quotation/{id}/deactivate', [QuotationController::class, 'deactivate'])->name('quotation.deactivate');
    Route::post('/quotation/{id}/activate', [QuotationController::class, 'activate'])->name('quotation.activate');

});

require __DIR__.'/auth.php';
