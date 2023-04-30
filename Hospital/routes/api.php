<?php

use App\Http\Controllers\patientController;
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

Route::get('/patients',[patientController::class, 'index']);
Route::get('/patients/{id}',[patientController::class, 'show']);
Route::post('/add',[patientController::class, 'store']);
Route::put('/edit/{id}',[patientController::class, 'update']);
Route::delete('/delete/{id}',[patientController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
