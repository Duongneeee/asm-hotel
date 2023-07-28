<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roomtype extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
    ];

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function relatedDataExists(){
        return $this->rooms()->exists();
    }
}