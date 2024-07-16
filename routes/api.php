<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\AuthController;
use App\HTTP\Controllers\EmployeeController;
use App\HTTP\Controllers\TeamController;

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
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::controller(EmployeeController::class)->group(function () {
    Route::get('employees', 'index');
    Route::get('employees/{id}', 'show');
    Route::get('employees/{$id}', 'update');
    Route::get('employees/{$id}', 'destroy');
    Route::get('employees', 'store');
});


// Route::controller(TeamController::class)->group(function () {
//     Route::get('teams', 'index');
//     Route::get('teams/{id}', 'show');
//     Route::get('teams/{$id}', 'update');
//     Route::get('teams/{$id}', 'destroy');
//     Route::get('teams', 'store');
// });