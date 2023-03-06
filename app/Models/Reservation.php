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
        'services',
    ];

    public $casts = [
        'isDue' => 'boolean'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function room(){
        return $this->hasOne(Room::class);
    }
}
