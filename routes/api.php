<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\student_Controller;
use App\http\Controllers\department_Controller;
use App\http\Controllers\Subject_Controller;
use App\Models\department;
use App\Models\subject;


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
Route::get('/students', [student_Controller::class, 'index']);
Route::post('/student', [student_Controller::class, 'store']);
Route::get('/student/{id}',[student_Controller::class,'show']);
Route::put('/student/{id}/edit',[student_Controller::class,'update']);
Route::delete('/student/{id}/delete',[student_Controller::class,'destroy']);

//Department ResfullAPI
Route::get('/departments', [department_Controller::class, 'index']);
Route::post('/department', [department_Controller::class, 'department_store']);
Route::get('/department/{id}',[department_Controller::class,'show']);
Route::put('/department/{id}/edit',[department_Controller::class,'update']);
Route::delete('/department/{id}/delete',[department_Controller::class,'destroy']);

//Subject Resfull APi
Route::get('/subjects', [Subject_Controller::class, 'index']);
Route::post('/subject', [Subject_Controller::class, 'store']);
Route::get('/subject/{id}',[Subject_Controller::class,'show']);
Route::put('/subject/{id}/edit',[Subject_Controller::class,'update']);
Route::delete('/subject/{id}/delete',[Subject_Controller::class,'destroy']);
