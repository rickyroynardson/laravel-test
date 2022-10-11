<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login');

Route::middleware(['guest'])->group(function () {
  Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
  Route::post('/login', [AuthenticationController::class, 'authenticate']);
  Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
  Route::post('/register', [AuthenticationController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
  Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::resource('book', BookController::class)->except(['show']);
});
