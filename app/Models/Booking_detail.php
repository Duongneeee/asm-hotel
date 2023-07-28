<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking_detail extends Model
{
    use HasFactory;

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function booking(){
        return $this->belongsTo(Booking::class);
    }
}
