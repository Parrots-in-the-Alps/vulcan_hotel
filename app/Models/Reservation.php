<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'entryDate',
        'exitDate',
        'user_id',
        'isDue',
        'room_id',
        'service_id',
        'checked_in',
        'guest_number'
    ];

    public $casts = [
        'isDue' => 'boolean',
        'service_id' =>  'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function access(){
        return $this->hasMany(Access::class);
    }
    
}
