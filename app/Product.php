<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function surtidores()
    {
        return $this->hasMany(Surtidor::class);
    }
}
