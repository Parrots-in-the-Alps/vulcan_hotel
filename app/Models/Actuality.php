<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actuality extends Model
{
    use HasFactory;

    protected $fillable = ['title_fr', 'title_en', 'image', 'description_fr', 'description_en', 'start_date', 'end_date'];
}
