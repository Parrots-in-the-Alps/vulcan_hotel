<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CallToAction extends Model
{
    use HasFactory;

    protected $fillable = ['action'];
    public $translatable = ['title'];

    public function hero(){
        return $this->belongsTo(Hero::class);
    }
   
}
