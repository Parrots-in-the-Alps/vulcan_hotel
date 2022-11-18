<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;


/**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'room_id';

    protected $fillable = ['name', 'number', 'type', 'capacity', 'price', 'status', 'image', 'description'];
}
