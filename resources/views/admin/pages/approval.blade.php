@extends('layout.master')

@section('master')
  {{-- {{ $reservations }} --}}
  <div class="min-w-full divide-y divide-gray-200">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            ID</th>
          <th scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Name</th>
          <th scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Email</th>
          <th scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Room</th>
          <th scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
          <th scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start</th>
          <th scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End</th>
          <th scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
          <th scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($reservations as $reservation)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->id }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->user->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->user->email }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->room->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->start_date }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->start_time }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->end_time }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->status }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <form method="post" action="{{ route('admin.reservation.approve') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                <button type="submit" class="text-indigo-600 hover:text-indigo-900">Approve</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
