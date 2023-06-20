<?php

use App\Http\Controllers\{
  AuthController,
  DashboardController,
  ReportingController,
  RoomController,
  RoomReservationController,
  SuperAdminController,
  UserController
};
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
  Route::get('/', [DashboardController::class, 'index'])->name('index');
  Route::get('/room/{room}', [RoomController::class, 'show'])->name('room.show-user');

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

  Route::group(['middleware' => 'admin'], function () {
    Route::group(['prefix' => 'approval'], function () {
      Route::get('/', [RoomReservationController::class, 'adminReservationIndex'])->name('admin.pages.approval');
      Route::put('/', [RoomReservationController::class, 'approve'])->name('admin.reservation.approve');
    });
  });
});

Route::group(['middleware' => ['guest']], function () {
  Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
  Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
  Route::post('/login', [AuthController::class, 'login']);
  Route::post('/register', [AuthController::class, 'register']);
});

Route::group(['middleware' => ['auth', 'super-admin']], function () {
  Route::get('/admin', [SuperAdminController::class, 'index'])->name('admin.index');
  Route::resource('/admin/user', UserController::class);
  Route::resource('/admin/room', RoomController::class);
  Route::get('upload', [RoomController::class, 'showUploadRooms']);
  Route::post('upload', [RoomController::class, 'uploadRooms'])->name('room.upload');
});
