<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AuthController;

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


// Route untuk Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Route for Staff
// Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
Route::resource('staff', StaffController::class)->middleware('auth');

// Route::get('/staff', [StaffController::class,'index'])->name('staff.index');
// Route::get('/staff/create', [StaffController::class,'create'])->name('staff.create');
// Route::post('/staff/store', [StaffController::class,'store'])->name('staff.store');
// Route::get('/staff-edit/{$users}', [StaffController::class,'edit'])->name('staff.edit');
// Route::patch('/staff-update/{$users}', [StaffController::class,'update'])->name('staff.update');
// Route::delete('/staff-destroy/{$users}', [StaffController::class,'destroy'])->name('staff.destroy');


Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginpost');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('registerpost');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
