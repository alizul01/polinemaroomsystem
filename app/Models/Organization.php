<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['users'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
