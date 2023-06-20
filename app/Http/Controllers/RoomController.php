<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Imports\RoomsImport;
use App\Models\RoomReservation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RoomController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $rooms = Room::paginate(5);

    return view('rooms.index', compact('rooms'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('rooms.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreRoomRequest $request)
  {
    Room::create($request->validated());
    toast()->success('Room created');
    return redirect()->route('room.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Room $room)
  {
    $roomReservation = RoomReservation::where('room_id', $room->id)->get();
    if (auth()->user()->role == 'superadmin') {
      return view('rooms.show', compact('room', 'roomReservation'));
    }

    return view('rooms.show-user', compact('room', 'roomReservation'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Room $room)
  {
    return view('rooms.edit', compact('room'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateRoomRequest $request, Room $room)
  {
    $room->update($request->validated());

    toast()->success('Room updated');
    return redirect()->route('room.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Room $room)
  {
    $room->delete();

    toast()->success('Room deleted');
    return redirect()->route('room.index');
  }

  public function showUploadRooms()
  {
    return view('rooms.upload');
  }
  public function uploadRooms(Request $request)
  {
    Excel::import(new RoomsImport, $request->file);
    return redirect()->route('admin.index')->with('success', 'User Imported Successfully');
  }
}
