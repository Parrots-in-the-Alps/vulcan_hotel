<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ReservationService extends Pivot
{
    use HasFactory;

    protected $fillable = ['service_id', 'reservation_id'];

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }

    public function service()
    {
        return $this->hasOne(Service::class);
    }

    /**
 * Indicates if the IDs are auto-incrementing.
 *
 * @var bool
 */
public $incrementing = true;

}
