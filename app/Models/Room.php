<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Room extends Model
{
    use HasFactory, HasTranslations;



    protected $fillable = ['number', 'capacity', 'price', 'image','isActive'];
    public $translatable = ['description', 'name', 'type', 'status'];
}
