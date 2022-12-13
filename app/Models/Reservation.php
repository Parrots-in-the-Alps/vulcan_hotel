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
    ];

    public $casts = [
        'isDue' => 'boolean'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function room(){
        return $this->belongsToMany(Room::class)
        ->withPivot('guest_number')
        ->withTimestamps();
    }

    public function service(){
        return $this->belongsToMany(Service::class)
        ->withTimestamps();
    }
}
