<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'footer_id';

    /**
     * Get the adress associated with the footer.
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
