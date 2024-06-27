<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjconController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CalculateController;
use App\Models\Calculate;
use App\Models\Projcon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index']);

Route::get('/employee', [EmployeeController::class, 'index']);
Route::post('/employee', [EmployeeController::class, 'store']);
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit']);
Route::post('/employee/update/{id}', [EmployeeController::class, 'update']);
Route::get('/employee/delete/{id}', [EmployeeController::class, 'destroy']);

Route::get('/client', [ClientController::class, 'index']);

Route::get('/offer', [OfferController::class, 'index']);
Route::post('/offer', [OfferController::class, 'store']);
Route::get('/offer/edit/{id}', [OfferController::class, 'edit']);
Route::post('/offer/update/{id}', [OfferController::class, 'update']);
Route::get('/offer/delete/{id}', [OfferController::class, 'destroy']);

Route::get('/project-setup', [CalculateController::class, 'index']);
Route::post('/project-setup', [CalculateController::class, 'store']);
Route::get('/project-setup/edit/{id}', [CalculateController::class, 'edit']);
Route::post('/project-setup/update/{id}', [CalculateController::class, 'update']);
Route::get('/project-setup/delete/{id}', [CalculateController::class, 'destroy']);

Route::get('/project-control', [ProjconController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });
