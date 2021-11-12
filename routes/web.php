<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisitsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;

use \App\Http\Middleware\AuthPermissions;
use \App\Http\Middleware\DoctorPermissions;
use \App\Http\Middleware\AdminPermissions;


//visitor
Route::get('/', function () {return view('main');});
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'registerPatient']);
Route::get('/logout', [AuthController::class, 'logout']);

//doctor
Route::get('/visitsDoctor', [VisitsController::class, 'showVisitsForDoctor']);

//analyst
Route::get('/analysis', [VisitsController::class, 'showVisitsForAnalyst']);
Route::get('/analysis/{id_visit}', [VisitsController::class, 'analysisForward']);

//patient
Route::get('/visitsPatient', [VisitsController::class, 'showVisitsForPatient']);

Route::get('/booking', [VisitsController::class, 'showBookings']);
Route::post('/booking', [VisitsController::class, 'bookings']);

Route::get('/deleteVisit/{id}', [VisitsController::class, 'patientDeleteVisit']);

//comments
Route::get('/comments/{id_visit}/{id_patient}', [CommentController::class, 'showComments']);
Route::post('/comments/{id_visit}/{id_patient}', [CommentController::class, 'addComment']);

//admin
Route::get('/doctors', [AdminController::class, 'showDoctors']);
Route::post('/doctors', [AdminController::class, 'registerDoctors']);
