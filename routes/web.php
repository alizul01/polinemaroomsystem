<?php

use App\Http\Controllers\{
  ApprovalController,
  AuthController,
  DashboardController,
  ReportingController,
  RoomController,
  RoomReservationController
};
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
  Route::get('/', [DashboardController::class, 'index'])->name('index');
  Route::resource('room', RoomController::class);

  Route::group(['prefix' => 'reservation'], function () {
    Route::get('/', [RoomReservationController::class, 'showStep1'])->name('reservation.index');
    Route::post('/', [RoomReservationController::class, 'postStep1'])->name('reservation.store');
    Route::get('/reservation-2', [RoomReservationController::class, 'showStep2'])->name('reservation2.index');
    Route::post('/reservation-2', [RoomReservationController::class, 'postStep2'])->name('reservation2.store');
    Route::get('/reservation-final', [RoomReservationController::class, 'showFinal'])->name('reservation.final');
    Route::post('/reservation-final', [RoomReservationController::class, 'finish'])->name('reservation.final.store');
  });

  Route::get('/process', [RoomReservationController::class, 'reservationStatus'])->name('reservation.status');
  Route::post('/report-pdf', [ReportingController::class, 'createReportingPDF'])->name('user.reservation.generate');
  Route::get('logout', [AuthController::class, 'logout'])->name('logout');

  Route::group(['prefix' => 'approval', 'middleware' => 'admin'], function () {
    Route::get('/', [RoomReservationController::class, 'adminReservationIndex'])->name('admin.pages.approval');
    Route::put('/', [RoomReservationController::class, 'approve'])->name('admin.reservation.approve');
  });
});

Route::group(['middleware' => ['guest']], function () {
  Route::view('/login', 'auth.login')->name('login');
  Route::view('/register', 'auth.register')->name('register');
  Route::post('/login', [AuthController::class, 'login']);
  Route::post('/register', [AuthController::class, 'register']);
});

Route::get('/tes');
