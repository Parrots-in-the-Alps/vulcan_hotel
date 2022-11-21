<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'name_fr', 'name_en'];

    function footer()
    {
        return $this->belongsTo(Footer::class);
    }
}
