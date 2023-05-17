<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

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

// admin
Route::group(['middleware' => ['auth', 'admin']], function () {
  Route::get('/admin', function () {
    return response('Admin', 200);
  });
});

Route::group(['middleware' => ['auth']], function () {
  Route::get('/', [DashboardController::class, 'index'])->name('home');
  Route::resource('/room', RoomController::class);
  Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

// user guest
Route::group(['middleware' => ['guest']], function () {
  Route::get('/login', function () {
    return view('auth.login');
  })->name('login');

  Route::get('/register', function () {
    return view('auth.register');
  })->name('register');

  Route::post('/login', [AuthController::class, 'login']);
  Route::post('/register', [AuthController::class, 'register']);
});
