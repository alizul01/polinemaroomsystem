<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;

class RoomController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $rooms = Room::all();
    return view('user.ruangan', compact('rooms'));
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
    return view('user.detail-ruangan', compact('room'));
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
