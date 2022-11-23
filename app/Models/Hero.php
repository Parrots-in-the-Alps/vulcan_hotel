<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Hero extends Model
{
    use HasFactory, HasTranslations;



    protected $fillable = ['image', 'logo'];
    public $translatable = ['slogan'];


        /**
     * Get the CallToAction buttons for the hero.
     */
    public function callToAction()
    {
        return $this->hasMany(CallToAction::class);
    }
}
