<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisitsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;

use \App\Http\Middleware\AuthPermissions;
use \App\Http\Middleware\DoctorPermissions;
use \App\Http\Middleware\AdminPermissions;
use \App\Http\Middleware\AnalystPermissions;
use \App\Http\Middleware\RegisteredUserPermissions;
use \App\Http\Middleware\DoctorAnalystPermissions;
use \App\Http\Middleware\DoctorAnalystUserPermissions;


//visitor
Route::get('/', function () {return view('main');});
Route::get('/login', [AuthController::class, 'showLogin'])->middleware(AuthPermissions::class);
Route::post('/login', [AuthController::class, 'login'])->middleware(AuthPermissions::class);
Route::get('/register', [AuthController::class, 'showRegister'])->middleware(AuthPermissions::class);
Route::post('/register', [AuthController::class, 'registerPatient'])->middleware(AuthPermissions::class);
Route::get('/logout', [AuthController::class, 'logout']);

//doctor
Route::get('/visitsDoctor', [VisitsController::class, 'showVisitsForDoctor'])->middleware(DoctorPermissions::class);

//analyst
Route::get('/analysis', [VisitsController::class, 'showVisitsForAnalyst'])->middleware(AnalystPermissions::class);
Route::get('/analysis/{id_visit}', [VisitsController::class, 'analysisForward'])->middleware(AnalystPermissions::class);

//patient
Route::get('/visitsPatient', [VisitsController::class, 'showVisitsForPatient'])->middleware(RegisteredUserPermissions::class);
Route::get('/booking', [VisitsController::class, 'showBookings'])->middleware(RegisteredUserPermissions::class);
Route::post('/booking', [VisitsController::class, 'bookings'])->middleware(RegisteredUserPermissions::class);
Route::get('/deleteVisit/{id}', [VisitsController::class, 'patientDeleteVisit'])->middleware(RegisteredUserPermissions::class);

//comments
Route::get('/comments/{id_visit}/{id_patient}', [CommentController::class, 'showComments'])->middleware(DoctorAnalystUserPermissions::class);
Route::post('/comments/{id_visit}/{id_patient}', [CommentController::class, 'addComment'])->middleware(DoctorAnalystPermissions::class);

//admin
Route::get('/doctors', [AdminController::class, 'showDoctors'])->middleware(AdminPermissions::class);
Route::post('/doctors', [AdminController::class, 'registerDoctors'])->middleware(AdminPermissions::class);
