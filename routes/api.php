<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\AuthController;
use App\HTTP\Controllers\DepartmentController;
use App\HTTP\Controllers\UserController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;


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
Route::post('register',[AuthController::class,'register']);


Route::get('getAllDepartment',[DepartmentController::class,'getAllDepartment']);


  
// Route::get('setSidebar',[AuthController::class,'setSidebar']);
Route::get('profileUser',[UserController::class,'profileUser']);


Route::get('getToken',[AuthController::class,'getToken']);

Route::post('login',[AuthController::class,'login'])->name('login');
Route::middleware('auth:sanctum')->group(function () { 
Route::get('logout',[AuthController::class,'logout']);  
Route::get('getValues', [AuthController::class,'getValues']);    
});


