<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perte extends Model
{
    //
    public function vague(){
        return $this->belongsTo(Vague::class);
    }
}
