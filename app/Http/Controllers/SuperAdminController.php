<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomReservation;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
  public function index()
  {
    $users = User::count();
    $rooms = Room::count();
    $reservation = RoomReservation::all()->sortByDesc('created_at')->take(5);
    return view('admin.index', compact('users', 'rooms', 'reservation'));
  }
}
