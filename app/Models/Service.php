<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['image_icon', 'price','isActive', 'billing_type'];
    public $translatable = ['title', 'description'];

    public $casts = [
        'isActive' => 'boolean'
    ];

    protected $attributes = [
        'isActive' => false,
    ];

    public function reservation_service(){
        
        return $this->belongsToMany(ReservationService::class);
      
    }
    
}
