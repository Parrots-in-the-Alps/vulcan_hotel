<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lock extends Model
{
    use HasFactory;

    protected $fillable = [
        'nfc_tag',
        'room_id',
        'card_counter'
    ];

    public $casts = [
        'nfc_tag' => 'string',
        'card_counter' => 'integer'
    ];

    public function room(){
        return $this->hasOne(Room::class);
    }
}


