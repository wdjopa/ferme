<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    //
    public function vague(){
        return $this->belongsTo(Vague::class);
    }
    public function paiement(){
        return $this->belongsTo(Paiement::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function livraison(){
        return $this->belongsTo(Livraison::class);
    }
}
