<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vague extends Model
{
    //

    public function active(){
         $query = DB::table('vagues')
            ->where('etat', '=', '1')
            ->get()->toArray();
            return $query;
    }
}
