<?php

namespace App\Models;

use App\Models\Hotel;
use App\Models\Roomtype;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'hotel_id',
        'roomtype_id',
        'description',
        'image',
        'status'
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function roomtype(){
        return $this->belongsTo(Roomtype::class);
    }
}
