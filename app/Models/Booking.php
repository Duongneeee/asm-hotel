<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    public function rooms(){
        return $this->belongsToMany(Room::class,'booking_details')->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function discount(){
        return $this->belongsTo(Discount::class);
    }

    public function relatedDataExists(){
        return $this->discount()->exists();
    }
}
