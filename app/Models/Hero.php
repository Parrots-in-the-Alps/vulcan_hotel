<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'hero_id';


        /**
     * Get the CallToAction buttons for the hero.
     */
    public function callToAction()
    {
        return $this->hasMany(CallToAction::class);
    }
}
