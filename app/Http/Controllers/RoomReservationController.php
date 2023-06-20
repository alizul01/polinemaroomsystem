<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomReservationPostStepOne;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomReservation;
use Illuminate\Contracts\Session\Session;

class RoomReservationController extends Controller
{
  public function showStep1(Request $request)
  {
    $rooms = Room::all();
    $organizations = Organization::all();
    $step = 1;
    return view('reservation.index-step-1', compact('rooms', 'organizations', 'step'));
  }

  public function postStep1(RoomReservationPostStepOne $request)
  {
    $validatedData = $request->validated();
    $validatedData['user_id'] = auth()->user()->id;

    session()->put('step1', $validatedData);
    return redirect()->route('reservation2.index');
  }

  public function showStep2(Request $request)
  {
    $capacity = session()->get('step1')['participant'];
    if ($request->has('floor')) {
      $rooms = Room::where('floor', $request->floor)
        ->where('capacity', '>=', $capacity)
        ->whereDoesntHave('RoomReservation', function ($query) use ($request) {
          $query->where(function ($query) use ($request) {
            $query->whereBetween('start_time', [session()->get('step1')['start_time'], session()->get('step1')['end_time']])
              ->orWhereBetween('end_time', [session()->get('step1')['start_time'], session()->get('step1')['end_time']])
              ->orWhere([
                ['start_time', '<=', session()->get('step1')['start_time']],
                ['end_time', '>=', session()->get('step1')['end_time']]
              ]);
          })->where('start_date', session()->get('step1')['start_date']);
        })->paginate(6)->withQueryString();
    } else {
      $rooms = Room::where('capacity', '>=', $capacity)
        ->whereDoesntHave('RoomReservation', function ($query) use ($request) {
          $query->where(function ($query) use ($request) {
            $query->whereBetween('start_time', [session()->get('step1')['start_time'], session()->get('step1')['end_time']])
              ->orWhereBetween('end_time', [session()->get('step1')['start_time'], session()->get('step1')['end_time']])
              ->orWhere([
                ['start_time', '<=', session()->get('step1')['start_time']],
                ['end_time', '>=', session()->get('step1')['end_time']]
              ]);
          })->where('start_date', session()->get('step1')['start_date']);
        })->paginate(6);
    }

    if ($rooms->isEmpty()) {
      alert()->error('Ruangan tidak tersedia');
    }

    $step = 2;
    if (!$request->session()->has('step1')) {
      return redirect()->route('form.step1');
    }

    return view('reservation.index-step-2', compact('step', 'rooms'));
  }

  public function postStep2(Request $request)
  {
    $validatedData = $request->validate([
      'room_id' => 'required|exists:rooms,id',
    ]);

    $request->session()->put('step2', $validatedData);
    return redirect()->route('reservation.final');
  }

  public function showFinal()
  {
    $step = 3;
    $step1 = session()->get('step1');
    $step2 = session()->get('step2');
    $room = Room::where('id', $step2["room_id"])->first();
    return view('reservation.finish', compact('step', 'step1', 'step2', 'room'));
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

  public function reservationStatus()
  {
    $reservations = RoomReservation::where('user_id', auth()->user()->id)->get();
    foreach ($reservations as $reservation) {
      $reservation->reservationStatus();
    }
    return view('reservation.status', compact('reservations'));
  }

  public function approve(Request $request)
  {
    $reservation = RoomReservation::findOrFail($request->reservation_id);
    $role = auth()->user()->role;

    if ($role == 'kajur') {
      $reservation->approved_by_kepala_jurusan = !$reservation->approved_by_kepala_jurusan;
      $reservation->approved_by_kepala_jurusan_at = now();
    } elseif ($role == 'bem') {
      $reservation->approved_by_bem = !$reservation->approved_by_bem;
      $reservation->approved_by_bem_at = now();
    } elseif ($role == 'hmti') {
      $reservation->approved_by_himpunan = !$reservation->approved_by_himpunan;
      $reservation->approved_by_himpunan_at = now();
    } else {
      toast()->error('Reservasi gagal disetujui');
      return redirect()->route('admin.reservation.index');
    }

    $reservation->save();

    toast()->success('Reservasi berhasil disetujui');
    return redirect()->route('admin.pages.approval');
  }


  public function adminReservationIndex()
  {
    $reservations = RoomReservation::all();
    return view('approval.index', compact('reservations'));
  }
}
