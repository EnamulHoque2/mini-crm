<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Company;
use App\Http\Controllers\Employee;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

// Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->group(function(){
        Route::get('login', [AuthenticatedSessionController::class, 'index'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('adminlogin');
    });
    // Route::middleware('admin')->group(function(){
       
    // });
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// company

Route::controller(Company::class)->group(function () {
    Route::get('add_company', 'index')->name('index');
    Route::post('add_company', 'store')->name('store');
    Route::get('edit-company/{id}', 'edit')->name('edit');
    Route::put('update_company/{id}', 'update')->name('update');
    Route::delete('delete-company/{id}', 'destroy')->name('destroy');
});

// Employee

Route::controller(Employee::class)->group(function () {
    Route::get('add_employee', 'index')->name('empindex');
    Route::post('add_employee', 'store')->name('empstore');
    Route::get('edit-employee/{id}', 'edit')->name('empedit');
    Route::put('update_employee/{id}', 'update')->name('empupdate');
    Route::delete('delete-employee/{id}', 'destroy')->name('empdestroy');
});