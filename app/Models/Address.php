<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['street_num', 'street_name', 'zip', 'city_name', 'country','isActive'];

    public $casts = [
        'isActive' => 'boolean'
    ];

    protected $attributes = [
        'isActive' => false,
    ];

    public function footer(){
        return $this->belongsTo(Footer::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
