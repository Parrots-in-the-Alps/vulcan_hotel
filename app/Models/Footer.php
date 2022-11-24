<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = ['phone_number', 'mail', 'logo', 'address_id','isActive'];

    public $casts = [
        'isActive' => 'boolean'
    ];

    protected $attributes = [
        'isActive' => false,
    ];

    /**
     * Get the adress associated with the footer.
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Get the links associated with the footer.
     */
    public function Link()
    {
        return $this->hasMany(Link::class);
    }
    
}
