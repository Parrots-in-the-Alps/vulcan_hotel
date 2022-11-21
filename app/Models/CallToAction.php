<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallToAction extends Model
{
    use HasFactory;

    protected $fillable = ['title_fr', 'title_en', 'action'];

    public function hero(){
        return $this->belongsTo(Hero::class);
    }
   
}
