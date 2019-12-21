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
    public function paiementOk(){
        return DB::table('commandes')
            ->join('paiements', 'paiements.id', '=', 'commandes.paiement_id')
            ->where('paiements.etat', '2')->get();
    }
}
