<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('login', function () {
    return view('login');
});

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard',[AdminController::class, 'dashboard']);

    Route::get('users', [AdminController::class, 'index']);

    Route::get('add_user', function () {
        return view('user.add_user');
    });

    Route::post('add_user', [AdminController::class, 'store'])->name('add_user');

    Route::get('edit_user/{id}', [AdminController::class, 'edit_user']);

    Route::post('edit_user/{id}', [AdminController::class, 'update'])->name('edit_user');

    Route::get('delete_user/{id}', [AdminController::class, 'destroy']);

    Route::get('event', [AdminController::class, 'event']);
    Route::get('addevents', [AdminController::class, 'addevents']);
    Route::post('saveevent', [AdminController::class, 'saveevent']);
    Route::get('edit_event/{id}', [AdminController::class, 'edit_event']);
    Route::post('saveeditevent/{id}', [AdminController::class, 'saveeditevent']);
    Route::get('delete_event/{id}', [AdminController::class, 'delete_event']);

    Route::get('discount', [AdminController::class, 'discount']);
    Route::get('add_discount', [AdminController::class, 'add_discount']);
    Route::post('savediscount', [AdminController::class, 'savediscount']);
    Route::get('edit_discount/{id}', [AdminController::class, 'edit_discount']);
    Route::post('saveeditdiscount/{id}', [AdminController::class, 'saveeditdiscount']);
    Route::get('delete_discount/{id}', [AdminController::class, 'delete_discount']);


    Route::get('services', [ServicesController::class, 'index']);

    Route::get('add_service', [ServicesController::class, 'add_service'])->name('add_');

    Route::post('add_service', [ServicesController::class, 'store'])->name('add_service');

    Route::get('edit_service/{id}', [ServicesController::class, 'edit_service']);

    Route::post('edit_service/{id}', [ServicesController::class, 'update'])->name('edit_service');

    Route::get('delete_service/{id}', [ServicesController::class, 'destroy']);

});
