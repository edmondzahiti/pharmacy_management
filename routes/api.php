<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:api', 'IsAdmin'], 'prefix' => ''], function () {
    Route::resource('pharmacies', 'App\Http\Controllers\PharmacyController');
    Route::resource('employees', 'App\Http\Controllers\EmployeeController');
});
