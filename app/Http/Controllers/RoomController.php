<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\RoomReservation;
use Illuminate\Http\Request;

class RoomController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    if ($request->has('floor')) {
      $rooms = Room::where('floor', $request->floor)->paginate(6)->withQueryString();
    } else {
      $rooms = Room::paginate(6);
    }
    $isreservation = false;

    $status = RoomReservation::where('user_id', auth()->user()->id)->get();
    return view('user.ruangan', compact('rooms', 'status', 'isreservation'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreRoomRequest $request)
  {

  }

  /**
   * Display the specified resource.
   */
  public function show(Room $room)
  {
    $roomReservation = RoomReservation::where('room_id', $room->id)->get();
    return view('user.detail-ruangan', compact('room', 'roomReservation'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Room $room)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateRoomRequest $request, Room $room)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Room $room)
  {
    //
  }
}
