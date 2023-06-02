<?php

namespace Database\Seeders;

use App\Models\RoomReservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      RoomReservation::create([
        'user_id' => 19,
        'room_id' => 5,
        'start_date' => '2021-05-03',
      ]);
    }
}
