<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['street_num', 'street_name', 'zip', 'city_name', 'country','isActive'];

    public function footer(){
        return $this->belongsTo(Footer::class);
    }
}
