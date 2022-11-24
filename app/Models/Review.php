<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['rating', 'comment', 'user_name', 'image_user_avatar', 'isActive'];

    public $casts = [
        'isActive' => 'boolean'
    ];

    protected $attributes = [
        'isActive' => false,
    ];
    
}
