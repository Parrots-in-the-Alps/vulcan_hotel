<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;



    protected $fillable = ['name_fr', 'name_en', 'number', 'type_fr', 'type_en', 'capacity', 'price', 'status', 'image', 'description_fr', 'description_en'];
}
