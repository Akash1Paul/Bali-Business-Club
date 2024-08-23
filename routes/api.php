<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PhotoUploadController;
use App\Http\Middleware\CorsMiddleware;

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
Route::post('userRegister',[UserController::class,'userRegister']);
Route::post('userlogin',[UserController::class,'userlogin']);
Route::post('userlogout', [UserController::class, 'userlogout']);
Route::post('get_current_logged_user', [AuthController::class, 'getLoggedInUser']);

Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('reset-password', [AuthController::class, 'reset']);
// services api
Route::get('services', [ServicesController::class, 'services']);

// services api
Route::get('events', [EventController::class, 'index']);

// services api
Route::get('discounts', [DiscountController::class, 'index']);

Route::post('charge', [PaymentController::class, 'charge']);
Route::middleware('auth:sanctum')->group(function () {

//////-----------------------users----------------------------------------------------------------->
    Route::post('userUpdate/{id}', [UserController::class, 'update']);
    Route::get('getUserByID/{id}', [UserController::class, 'getUserByID']);


/////-------------------------------------Services------------------------------------------------->
    Route::get('services', [ServicesController::class, 'services']);
    Route::get('getservicesbyid/{id}', [ServicesController::class, 'getservicesbyid']);

/////-------------------------------------Event---------------------------------------------------->
    Route::get('getevents', [EventController::class, 'getevents']);
    Route::get('geteventbyid/{id}', [EventController::class, 'geteventbyid']);

/////---------------------------------Community---------------------------------------------------->
    Route::get('getcommutiny', [CommunityController::class, 'getcommutiny']);
    Route::get('getcommutinybyid/{id}', [CommunityController::class, 'getcommutinybyid']);

/////---------------------------------Community---------------------------------------------------->
    Route::get('gettransaction/{id}', [UserController::class, 'gettransaction']);
    
   
});




