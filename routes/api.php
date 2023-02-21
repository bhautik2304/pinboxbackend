<?php

use App\Http\Controllers\{EmployeController,authController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('/employes',EmployeController::class);
Route::apiResource('/users',authController::class);
Route::post('/authlogin',[authController::class,'login']);
Route::post('/authregister',[authController::class,'register']);
