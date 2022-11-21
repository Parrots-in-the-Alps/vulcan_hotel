<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;



    protected $fillable = ['image', 'logo', 'slogan_fr', 'slogan_en'];


        /**
     * Get the CallToAction buttons for the hero.
     */
    public function callToAction()
    {
        return $this->hasMany(CallToAction::class);
    }
}
