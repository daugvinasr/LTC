<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisitsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\AuthPermissions;
use \App\Http\Middleware\DoctorPermissions;
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




Route::get('/', function () {return view('main');});
Route::get('/login', [AuthController::class, 'showLogin'])->middleware(AuthPermissions::class);
Route::post('/login', [AuthController::class, 'login'])->middleware(AuthPermissions::class);
Route::get('/register', [AuthController::class, 'showRegister'])->middleware(AuthPermissions::class);
Route::post('/register', [AuthController::class, 'registerPatient'])->middleware(AuthPermissions::class);
Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/visits', [VisitsController::class, 'showVisits'])->middleware(DoctorPermissions::class);




