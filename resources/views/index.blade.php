@extends('layout.master')
@section('master')
    @include('partials.navbar')
    @if (Auth::user()->isAdmin())
        <main class="flex gap-6 mt-20 mb-10 px-10">
            <section class="flex flex-col grow gap-4 p-6 bg-white  border-2 rounded-lg shadow-md">
                <div class="flex justify-between items-center">
                    <h1 class="text-xl font-medium">Ruangan</h1>
                    <div>
                        @include('components.dropdown')
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4" id="roomlist">
                    @foreach ($rooms as $room)
                        <x-card-room :id="$room->id" status="kosong" :isreservation="false" :name="$room->name" :image="$room->image"
                            :capacity="$room->capacity" :code="$room->code" :room="$room" :floor="$room->floor" />
                    @endforeach
                </div>
                {{ $rooms->links('pagination::tailwind') }}
            </section>
            <aside class="flex flex-col shrink gap-6">
                @if (!Auth::user()->isAdmin())
                    @include('reservation.status')
                @endif
                @include('reservation.log')
            </aside>
        </main>
    @else
        <main class="flex gap-6 mt-20 mb-10 px-10">
            <section class="flex flex-col grow gap-4 p-6 bg-white  border-2 rounded-lg shadow-md">
                <div class="flex justify-between items-center">
                    <h1 class="text-xl font-medium">Ruangan</h1>
                    <div>
                        @include('components.dropdown')
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($rooms as $room)
                        <x-card-room :id="$room->id" status="kosong" :isreservation="false" :name="$room->name"
                            :image="$room->image" :capacity="$room->capacity" :code="$room->code" :room="$room"
                            :floor="$room->floor" />
                    @endforeach
                </div>
                {{ $rooms->links('pagination::tailwind') }}
            </section>
            <aside class="flex flex-col shrink gap-6">
                @include('reservation.partials.status-peminjaman')
                @include('reservation.log')
            </aside>
        </main>
    @endif
@endsection
