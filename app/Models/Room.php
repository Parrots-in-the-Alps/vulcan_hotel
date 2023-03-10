<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Room extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['number', 'capacity', 'price', 'image','isQueued','isActive'];
    public $translatable = ['description', 'name', 'type'];

    public $casts = [
        'isActive' => 'boolean',
        'isQueued' => 'boolean'
    ];

    protected $attributes = [
        'isActive' => false,
        'isQueued' => false
    ];
    
    public function reservation(){
        return $this->belongsToMany(Reservation::class)
        ->using(RoomReservation::class)
        ->withPivot('guest_number')
        ->withTimestamps();
    }
}
