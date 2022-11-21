<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory;

    protected $fillable = ['image_icon', 'title_fr', 'title_en',  'description_fr', 'description_en', 'price'];
}
