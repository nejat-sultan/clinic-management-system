<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\EmployeetypeController;


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

Route::resource("/employee", EmployeeController::class);

Route::resource("/dashboard", DashboardController::class);

Route::resource("/lab", LabController::class);
Route::get("/editlab/{id}", [LabController::class, 'edit']);
Route::put("/lab", [LabController::class, 'update']);

Route::resource("/region", RegionController::class);
Route::get("/editregion/{id}", [RegionController::class, 'edit']);
Route::put("/region", [RegionController::class, 'update']);

Route::resource("/employeetype", EmployeetypeController::class);
Route::get("/editemployeetype/{id}", [EmployeetypeController::class, 'edit']);
Route::put("/employeetype", [EmployeetypeController::class, 'update']);


