<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actuality extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['image', 'start_date', 'end_date', 'isActive'];

    public $translatable = ['title', 'description'];
}
