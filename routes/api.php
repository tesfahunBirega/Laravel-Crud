<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\student_Controller;

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
Route::get('/student', [student_Controller::class, 'index']);
Route::post('/student', [student_Controller::class, 'store']);
Route::get('/student/{id}',[student_Controller::class,'show']);
Route::put('/student/{id}/edit',[student_Controller::class,'update']);
Route::delete('/student/{id}/delete',[student_Controller::class,'destroy']);