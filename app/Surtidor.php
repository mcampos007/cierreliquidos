<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surtidor extends Model
{
     public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function turnoDetails()
    {
        return $this->hasMany(TurnoDetail::class);
    }
}
