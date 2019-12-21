<?php

namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    
    public function commandes(){
        return $this->hasMany(Commande::class);
    }
    public function commandesPayees(){
         return DB::table('commandes')
            ->join('paiements', 'paiements.id', '=', 'commandes.paiement_id')
            ->where('paiements.etat', '0')->get();
    }
}
