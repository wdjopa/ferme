<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    //
    public function commande(){
        return $this->hasOne(Commande::class);
    }
}
