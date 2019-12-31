<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Approvisionnement;
use App\CategorieApprovisionnement;
use App\Vague;
use App\Fournisseur;
use App\Paiement;
use App\Commande;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $categories_approvisionnements = CategorieApprovisionnement::all();
        $approvisionnements = Approvisionnement::all();
        $commandes = Commande::all();
        $vagues = Vague::all();
        $fournisseurs = Vague::all();

        return view("home",compact("categories_approvisionnements", "approvisionnements", "commandes", "vagues", "fournisseurs"));
    
    }

    /**
     * Show the application settings.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function parametres()
    {
        return view('layouts.parametres');
    }
}
