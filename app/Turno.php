<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function turnoDetails()
    {
        return $this->hasMany(TurnoDetail::class);
    }

}
