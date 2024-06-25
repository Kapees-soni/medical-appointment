<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClinicianController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AvailabilityController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/clinicians', [ClinicianController::class, 'index']);
Route::post('/clinicians', [ClinicianController::class, 'store']);
Route::put('/clinicians/{id}', [ClinicianController::class, 'update']);

Route::get('/appointments', [AppointmentController::class, 'index']);
Route::post('/appointments', [AppointmentController::class, 'store']);
Route::put('/appointments/{id}', [AppointmentController::class, 'update']);

Route::get('/availabilities', [AvailabilityController::class, 'index']);
Route::post('/availabilities', [AvailabilityController::class, 'store']);
Route::put('/availabilities/{id}', [AvailabilityController::class, 'update']);
Route::post('/availabilities', [AvailabilityController::class, 'show']);
