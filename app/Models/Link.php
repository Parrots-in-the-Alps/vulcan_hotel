<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['url'];
    public $translatable = ['name'];

    function footer()
    {
        return $this->belongsTo(Footer::class);
    }
}
