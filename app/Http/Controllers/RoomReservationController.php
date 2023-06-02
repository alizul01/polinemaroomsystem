<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomReservation;

class RoomReservationController extends Controller
{
  public function showStep1(Request $request)
  {
    $rooms = Room::all();
    $organizations = Organization::all();
    $step = 1;
    return view('user.partials.components.reservasi-step1', compact('rooms', 'organizations', 'step'));
  }

  public function postStep1(Request $request)
  {
    $reservationData['user_id'] = auth()->user()->id;
    $reservationData['user_id'] = auth()->user()->nomor_induk;
    $validatedData = $request->validate([
     'organization_id' => 'required|exists:organizations,id',
     'phonenumber' => 'required',
     'start_date' => 'required',
     'start_time' => 'required',
     'end_time' => 'required|after:start_time',
     'participant' => 'required',
     'keterangan' => 'required',
    ]);

    session()->put('step1', $validatedData);
    return redirect()->route('reservation2.index');
  }

  public function showStep2(Request $request)
  {
    $step = 2;
    if (!$request->session()->has('step1')) {
      return redirect()->route('form.step1');
    }

    if ($request->has('floor')) {
      $rooms = Room::where('floor', $request->floor)->get();
    } else {
      $rooms = Room::all();
    }
    return view('user.partials.components.reservasi-step2', compact('step', 'rooms'));
  }

  public function postStep2(Request $request)
  {
  $validatedData = $request->validate([
      'room_id' => 'required|exists:rooms,id',
    ]);

    $request->session()->put('step2', $validatedData);
    return redirect()->route('reservation.final');
  }

  public function showFinal() {
    $step = 3;
    $step1 = session()->get('step1');
    $step2 = session()->get('step2');
    $room = Room::where('id', $step2["room_id"])->first();
    return view('user.partials.components.finish', compact('step', 'step1', 'step2', 'room'));
  }

  public function finish(Request $request)
  {
    if (!$request->session()->has('step1') || !$request->session()->has('step2')) {
      return redirect()->route('reservation.final');
    }

    $step1Data = $request->session()->get('step1');
    $step2Data = $request->session()->get('step2');

    $reservationData = array_merge($step1Data, $step2Data);
    $reservationData['user_id'] = auth()->user()->id;

    RoomReservation::create($reservationData);

    $request->session()->forget('step1');
    $request->session()->forget('step2');

    toast()->success('Reservasi berhasil');
    return redirect()->route('reservation.index');
  }

  public function reservationStatus(){
    $reservations = RoomReservation::where('user_id', auth()->user()->id)->get();
    foreach($reservations as $reservation){
      $reservation->reservationStatus();
    }
    return view('user.reservation-status', compact('reservations'));
  }
}
