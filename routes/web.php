<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\RecordController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/main', function () {
    return view('main');
})->middleware('auth')->name('main');


Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('employee/create', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('employee/{id_number}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('employee/{id_number}/edit', [EmployeeController::class, 'update'])->name('employee.update');

Route::get('record', [RecordController::class, 'index'])->name('record.index');
Route::get('record/create', [RecordController::class, 'create'])->name('record.create');
Route::post('record/create', [RecordController::class, 'store'])->name('record.store');
Route::get('record/{id_number}/edit', [RecordController::class, 'edit'])->name('record.edit');
Route::put('record/{id_number}/edit', [RecordController::class, 'update'])->name('record.update');
Route::get('record/{id_number}/delete', [RecordController::class, 'destroy'])->name('record.destroy');

Route::get('export', [EmployeeController::class, 'export'])->name('employee.export');

Route::get('employees/archived', [EmployeeController::class, 'archived'])->name('employee.archived');
Route::post('employees/{id_number}/archive', [EmployeeController::class, 'archive'])->name('employee.archive');
Route::post('employees/{id_number}/restore', [EmployeeController::class, 'restore'])->name('employee.restore');

Route::post('/follow-up/{id_number}', [RecordController::class, 'storeFollowUp'])->name('follow_up.store');
