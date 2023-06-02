<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomReservation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['user', 'room', 'documents'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function documents()
    {
        return $this->hasOne(Document::class, 'room_reservation_id');
    }

    public function reservationStatus()
    {
        $valHimpunan = $this->approved_by_himpunan;
        $valBem = $this->approved_by_bem;
        $valKajur = $this->approved_by_kepala_jurusan;

        if ($valHimpunan == 1 && $valBem == 1 && $valKajur == 1) {
            $this->status = 'Approved';
        } elseif ($valHimpunan == -1 || $valBem == -1 || $valKajur == -1) {
            $this->status = 'Rejected';
        } else{
          $this->status = 'Pending';
        }

        $this->update(['status' => $this->status]);
    }
}
