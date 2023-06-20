@extends('layout.master')
@section('master')
    @include('partials.navbar')
    <main class="-mt-14 mb-10 px-10">
        <section class="flex flex-col grow gap-4 p-6 bg-white border-2 rounded-lg shadow-md mb-10">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-lg">Peminjaman</h1>
            </div>
            <span>
                <p class="text-sm text-gray-500">
                    Berikut adalah daftar peminjaman yang telah diajukan oleh pengguna.
                </p>
            </span>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-1 text-center py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Diajukuan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ruangan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Dipakai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Val.Bem
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Val.Himpunan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Val.KaJur
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr class="bg-white border-b">
                                <td class="px-1 text-center py-4">
                                    {{ $reservation->id }}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($reservation->created_at)->format('d M Y') }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $reservation->room->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($reservation->start_date)->format('d M Y') }}
                                </td>

                                <td class="px-6 py-4">
                                    @if ($reservation->approved_by_bem == 1)
                                        <span id="status-bem-{{ $reservation->id }}"
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500 text-white">
                                            Validasi Terkonfirmasi
                                        </span>
                                    @elseif (Auth::user()->role == 'bem')
                                        @if ($reservation->approved_by_bem)
                                            <span id="status-bem-{{ $reservation->id }}"
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500 text-white">
                                                Validasi Terkonfirmasi
                                            </span>
                                        @elseif (Auth::user()->role == 'bem')
                                            <form id="{{ $reservation->id }}" method="post" action="/approval">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                                <button type="button" onclick="confirmSubmission('{{ $reservation->id }}')"
                                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                                    Validasi
                                                </button>
                                            </form>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-400 text-black">
                                                Dalam Proses
                                            </span>
                                        @endif
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-400 text-black">
                                            Dalam Proses
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    @if ($reservation->approved_by_himpunan == 1)
                                        <span id="status-himpunan-{{ $reservation->id }}"
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500 text-white">
                                            Validasi Terkonfirmasi
                                        </span>
                                    @elseif (Auth::user()->role == 'hmti')
                                        @if ($reservation->approved_by_himpunan)
                                            <span id="status-himpunan-{{ $reservation->id }}"
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500 text-white">
                                                Validasi Terkonfirmasi
                                            </span>
                                        @elseif (Auth::user()->role == 'hmti')
                                            <form id="{{ $reservation->id }}" method="post" action="/approval">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                                <button type="button"
                                                    onclick="confirmSubmission('{{ $reservation->id }}')"
                                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                                    Validasi
                                                </button>
                                            </form>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-400 text-black">
                                                Dalam Proses
                                            </span>
                                        @endif
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-400 text-black">
                                            Dalam Proses
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($reservation->approved_by_kepala_jurusan == 1)
                                        <span id="status-kajur-{{ $reservation->id }}"
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500 text-white">
                                            Validasi Terkonfirmasi
                                        </span>
                                    @elseif (Auth::user()->role == 'kajur')
                                        @if ($reservation->approved_by_kepala_jurusan)
                                            <span id="status-kajur-{{ $reservation->id }}"
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500 text-white">
                                                Validasi Terkonfirmasi
                                            </span>
                                        @elseif (Auth::user()->role == 'kajur')
                                            <form id="{{ $reservation->id }}" method="post" action="/approval">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                                <button type="button"
                                                    onclick="confirmSubmission('{{ $reservation->id }}')"
                                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                                    Validasi
                                                </button>
                                            </form>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-400 text-black">
                                                Dalam Proses
                                            </span>
                                        @endif
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-400 text-black">
                                            Dalam Proses
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
@endsection
