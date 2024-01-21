<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;
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


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
Route::group([
    'prefix' => 'program'
], function () {
    Route::get('/', [ProgramController::class, 'getAllPrograms']);
    Route::get('/{programId}', [ProgramController::class, 'getProgram']);
    Route::post('/create', [ProgramController::class, 'create']);
    Route::patch('/update/{programId}', [ProgramController::class, 'update']);
    Route::delete('/dedlete/{programId}', [ProgramController::class, 'delete']);
});
Route::group([
    'prefix' => 'user'
], function () {
    Route::patch('', [UserController::class, 'index']);
    Route::patch('/update', [UserController::class, 'update']);
    Route::delete('/dedlete', [UserController::class, 'delete']);
});
