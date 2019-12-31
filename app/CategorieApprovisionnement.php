<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieApprovisionnement extends Model
{
    //
    public function approvisionnements(){
        return $this->belongsToMany(Approvisionnement::class);
    }
}
