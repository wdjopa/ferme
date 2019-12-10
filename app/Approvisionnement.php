<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approvisionnement extends Model
{
    //
    public function categorie(){
        return $this->belongsTo(CategorieApprovisionnement::class);
    }
    public function fournisseur(){
        return $this->hasOne(Fournisseur::class);
    }
}
