<?php

use App\Http\Controllers\ApprovalController;
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

Route::get('/', function () {
    return view('welcome');
});

// admin
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', function () {
        return response('Admin', 200);
    });

    Route::resource('approval', ApprovalController::class)->parameter('approval', 'id');
});

// user guest

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', function () {
        return response('Login', 200);
    })->name('login');

    Route::get('/register', function() {
        return response('Register', 200);
    });
});
