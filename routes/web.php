<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\EmployeetypeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorAppointmentController;
use App\Http\Controllers\LabHistoryController;


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

Route::get('/', function () {
    return view('layout');
});


Route::resource("/employee", PersonController::class);
Route::get("/search", [PersonController::class, 'search']);

Route::resource("/dashboard", DashboardController::class);

Route::resource("/lab", LabController::class);
Route::get("/editlab/{id}", [LabController::class, 'edit']);
Route::put("/lab", [LabController::class, 'update']);
Route::get("/searchlab", [LabController::class, 'searchlab']);

Route::resource("/region", RegionController::class);
Route::get("/editregion/{id}", [RegionController::class, 'edit']);
Route::put("/region", [RegionController::class, 'update']);
Route::get("/searchregion", [RegionController::class, 'searchregion']);

Route::resource("/employeetype", EmployeetypeController::class);
Route::get("/editemployeetype/{id}", [EmployeetypeController::class, 'edit']);
Route::put("/employeetype", [EmployeetypeController::class, 'update']);
Route::get("/searchemployeetype", [EmployeetypeController::class, 'searchemployeetype']);

Route::resource("/appointment", AppointmentController::class);
Route::get("/editappointment/{id}", [AppointmentController::class, 'edit']);
Route::put("/appointment", [AppointmentController::class, 'update']);

Route::resource("/doctorappointment", DoctorAppointmentController::class);
Route::get("/orderlab/{id}", [DoctorAppointmentController::class, 'edit']);
Route::put("/doctorappointment", [DoctorAppointmentController::class, 'update']);
Route::get("/patienthistory/{id}", [DoctorAppointmentController::class, 'edithistory']);
Route::put("/patienthistory", [DoctorAppointmentController::class, 'updatehistory']);

Route::resource("/labhistory", LabHistoryController::class);
Route::get("/addresult/{id}", [LabHistoryController::class, 'edit']);
Route::put("/labhistory", [LabHistoryController::class, 'update']);


