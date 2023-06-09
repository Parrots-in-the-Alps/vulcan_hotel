<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'reservation_id'
    ];


    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }
}
