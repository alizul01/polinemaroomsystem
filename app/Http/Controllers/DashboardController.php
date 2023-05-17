<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
      if ($request->has('floor')) {
        $rooms = Room::where('floor', $request->floor)->get();
      } else {
        $rooms = Room::all();
      }

      $roomcount = Room::count();
      return view('user.dashboard', compact('rooms', 'roomcount'));
    }
}
