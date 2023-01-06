<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Orders\MakeOrder;
use App\Http\Controllers\Api\V1\ProblemSolving\ProblemSolvingController;
use App\Http\Controllers\Api\V1\Users\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');

    //Problem Solving
    Route::get('/problem-solving/problem-one', [ProblemSolvingController::class, 'problemOne'])->name('problem-one');
    Route::get('/problem-solving/problem-two', [ProblemSolvingController::class, 'problemTwo'])->name('problem-two');
    Route::get('/problem-solving/problem-three', [ProblemSolvingController::class, 'problemThree'])->name('problem-three');

    Route::middleware('auth:sanctum')->group( function () {
        Route::apiResource('users', UserController::class)->except(['store']);

        Route::post('make-order', MakeOrder::class)->name('make-order');
    });
});
