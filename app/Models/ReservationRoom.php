<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ReservationRoom extends Pivot
{
    use HasFactory;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected $fillable = ['room_id', 'reservation_id', 'guest_number'];

    public function reservation()
    {
        return  $this->hasOne(Reservation::class);
    }

    public function room()
    {
        return $this->hasOne(Room::class);
    }
}
