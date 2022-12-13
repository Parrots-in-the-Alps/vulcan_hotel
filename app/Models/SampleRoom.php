<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SampleRoom extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [ 'capacity', 'price', 'image','isActive'];
    public $translatable = ['description', 'name', 'type'];

    public $casts = [
        'isActive' => 'boolean'
    ];

    protected $attributes = [
        'isActive' => false,
    ];
}
