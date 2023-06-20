<?php

namespace App\Imports;

use App\Models\Room;
use Maatwebsite\Excel\Concerns\ToModel;

class RoomsImport implements ToModel
{
  public function model(array $row)
  {
    return new Room([
      'code' => $row[0],
      'name' => $row[1],
      'floor' => $row[2],
      'image' => asset('assets/images/rooms/' . $row[3]),
      'position' => $row[4],
      'type' => $row[5],
      'capacity' => $row[6],
    ]);
  }
}
