<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vague extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantite',
    ];
    public function active(){
         $query = DB::table('vagues')
            ->where('etat', '=', '1')
            ->get()->toArray();
            return $query;
    }
    
    public function approvisionnement(){
        return $this->belongsTo(Approvisionnement::class);
    }
    
    public function commandes(){
        return $this->hasMany(Commande::class);
    }
    public function totalVentes(){
        $total = 0;
        foreach ($this->commandes as $commande) {
            $total += $commande->cout_total;
        }
        return $total;
    }
    public function pertes(){
        return $this->hasMany(Perte::class);
    }
}
