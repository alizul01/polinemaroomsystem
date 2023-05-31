<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomReservationController;
use App\Models\RoomReservation;
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
Route::get('/ruangan', function () {
  return view('user.ruangan', [
    'active' => 'ruangan',
    'isHome' => false
  ]);
});

// admin
Route::group(['middleware' => ['auth', 'admin']], function () {
  Route::get('/admin', function () {
    return response('Admin', 200);
  });
});

Route::group(['middleware' => ['auth']], function () {
  Route::get('/', [DashboardController::class, 'index'])->name('index');
  Route::resource('room', RoomController::class);
  Route::get('/reservation', [RoomReservationController::class, 'showStep1'])->name('reservation.index');
  Route::post('/reservation', [RoomReservationController::class, 'postStep1'])->name('reservation.store');
  Route::get('/reservation-2', [RoomReservationController::class, 'showStep2'])->name('reservation2.index');
  Route::post('/reservation-2', [RoomReservationController::class, 'postStep2'])->name('reservation2.store');
  Route::get('/reservation-final', [RoomReservationController::class, 'showFinal'])->name('reservation.final');
  Route::post('/reservation-final', [RoomReservationController::class, 'finish'])->name('reservation.final.store');
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
