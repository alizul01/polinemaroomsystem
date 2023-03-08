<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusAttribute($value)
    {
        if ($value === 'pending') {
            return 'Menunggu';
        } elseif ($value === 'accepted') {
            return 'Diterima';
        } elseif ($value === 'rejected') {
            return 'Ditolak';
        }
    }
}
