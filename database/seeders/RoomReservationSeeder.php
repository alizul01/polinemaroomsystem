<?php

namespace Database\Seeders;

use \Models\RoomReservation;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomReservationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $reservations = [
      'user_id' => 5,
      'room_id' => 1,
      'start_date' => Carbon::now(),
      'start_time' => '09:00:00',
      'end_time' => '12:00:00',
      'keterangan' => 'Pertemuan penting',
      'participant' => 35,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ];

    RoomReservation::create($reservations);
  }
}
