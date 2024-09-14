<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [ClientController::class, 'index'])->name('home');
Route::post('/set-city', [ClientController::class, 'setCity'])->name('setCity');

Route::post('/save-order', [OrderController::class, 'saveOrder'])->name('save.order');

Route::get('/catalog/{city?}/{manufacturer?}', [ClientController::class, 'catalogPage'])->name('catalog');
Route::get('/car-find/{car_id}', [ClientController::class, 'processCatalogForm'])
    ->name('find-car');
Route::get('/catalog/{manufacture_name}/{car_model}/{year_of_manufacture}', [ClientController::class, 'showCarDetail'])
    ->name('car.details.view');

Route::post('/test-drive-store', [ClientController::class, 'storeTestDrive'])->name('test-drive-store');
Route::post('/car-order-store', [ClientController::class, 'storeCarOrder'])->name('car-order-store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::put('/admin/update', [AdminController::class, 'update'])->name('admin.update');

    Route::get('/admin/feedback', [AdminController::class, 'create'])->name('admin.feedback');
    Route::post('/admin/feedback', [AdminController::class, 'store'])->name('admin.feedback.store');
    Route::post('/admin/car-order/{id}/update-status', [AdminController::class, 'updateStatusCarOrder'])->name('admin.car-order.update-status');
    Route::post('/admin/test-drive/{id}/update-status', [AdminController::class, 'updateStatusTestDrive'])->name('admin.test-drive.update-status');
    Route::post('/admin/order/{id}/update-status', [AdminController::class, 'updateOrderAcceptance'])->name('admin.order-acceptance.update-status');
});

Route::middleware(['auth', 'verified', 'role:client'])->group(function () {
    Route::get('/client/dashboard', function () {
        return view('client.dashboard');
    })->name('client.dashboard');

    Route::put('/client/update', [ClientController::class, 'update'])->name('client.update');

    Route::get('/client/sell-car', [CarController::class, 'create'])->name('client.sell-car');
    Route::post('/client/sell-car', [CarController::class, 'store'])->name('client.sell-car.store');
});

require __DIR__ . '/auth.php';
