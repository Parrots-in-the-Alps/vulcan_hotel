<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Link extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['url'];
    public $translatable = ['name'];

    function footer()
    {
        return $this->belongsTo(Footer::class);
    }
}