<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    protected $fillable = ['banner_image','isActive'];

    public $casts = [
        'isActive' => 'boolean'
    ];

    protected $attributes = [
        'isActive' => false,
    ];
    
}
