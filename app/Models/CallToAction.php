<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CallToAction extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['hero_id','isActive'];
    public $translatable = ['title','modal_content','modal_title'];

    public function hero(){
        return $this->belongsTo(Hero::class);
    }

    
   
}
