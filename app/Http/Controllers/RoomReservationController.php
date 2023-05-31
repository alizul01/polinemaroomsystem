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
    $validatedData = $request->validate([
      'nama' => 'required',
      'nim' => 'required',
      'phonenumber' => 'required',
      'organization_id' => 'required|exists:organizations,id',
      'jam-mulai' => 'required',
      'jam-selesai' => 'required',
      'tanggal' => 'required',
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

    $rooms = Room::all();
    return view('user.partials.components.reservasi-step2', compact('step', 'rooms'));
  }

  public function postStep2(Request $request)
  {
    $validatedData = $request->validate([
      'room_id' => 'required|exists:rooms,id',
    ]);

    $request->session()->put('step2', $validatedData);
    return redirect()->route('form.step3');
  }

  public function finish(Request $request)
  {
    if (!$request->session()->has('step1') || !$request->session()->has('step2')) {
      return redirect()->route('finish');
    }

    $step1Data = $request->session()->get('step1');
    $step2Data = $request->session()->get('step2');

    $reservationData = array_merge($step1Data, $step2Data);

    RoomReservation::create($reservationData);

    $request->session()->forget('step1');
    $request->session()->forget('step2');

    // Redirect the user to a "thank you" page, or wherever you want them to go when they're done.
    return redirect()->route('reservations.thank_you');
  }
}
