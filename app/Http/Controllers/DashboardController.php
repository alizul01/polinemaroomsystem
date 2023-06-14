<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\RoomReservation;
class DashboardController extends Controller
{
    public function index(Request $request) {
      if ($request->has('floor')) {
        $rooms = Room::where('floor', $request->floor)->paginate(6)->withQueryString();
      } else {
        $rooms = Room::paginate(6);
      }

      $status = RoomReservation::where('user_id', auth()->user()->id)->get();
      $roomcount = Room::count();
      // log get 5 newest room reservation from all user
      $log = RoomReservation::orderBy('created_at', 'desc')->take(5)->get();
      return view('user.dashboard', compact('rooms', 'roomcount', 'status', 'log'));
    }
}
