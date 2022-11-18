<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallToAction extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'action'];

    public function hero(){
        return $this->belongsTo(Hero::class);
    }
   
}
