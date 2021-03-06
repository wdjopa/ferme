<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comptabilite;
use App\Approvisionnement;
use App\CategorieApprovisionnement;
use App\Vague;
use App\Fournisseur;
use Illuminate\Support\Facades\Auth;
use App\Paiement;
use App\Commande;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class ComptabiliteController extends Controller
{
    use ActivityLogger;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories_approvisionnements = CategorieApprovisionnement::all();
        $approvisionnements = Approvisionnement::all();
        $commandes = Commande::all();
        $vagues = Vague::all();
        $fournisseurs = Vague::all();
        $comptabilites = Comptabilite::all();

        return view("comptabilites.index",compact("comptabilites","categories_approvisionnements", "approvisionnements", "commandes", "vagues", "fournisseurs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comptabilite = new Comptabilite();
        $comptabilite->depense = false;
        $comptabilite->recette = false;
        if($request->type == 0){
            $comptabilite->depense = true;
        }
        else{
            $comptabilite->recette = true;
        }
        $comptabilite->auto = false;
        $comptabilite->montant = $request->montant;
        $comptabilite->date = $request->date;
        $comptabilite->categorie = $request->categorie;
        $comptabilite->commentaire = $request->commentaire;
        $comptabilite->save();
        ActivityLogger::activity("Enregistrement d'une nouvelle entrée comptable par l\'utilisateur :" . Auth::user()->name);

        return redirect()->back()->with("success", "Entrée ajoutée avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  Comptabilite $comptabilite
     * @return \Illuminate\Http\Response
     */
    public function show(Comptabilite $comptabilite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comptabilite $comptabilite
     * @return \Illuminate\Http\Response
     */
    public function edit(Comptabilite $comptabilite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Comptabilite $comptabilite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comptabilite $comptabilite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comptabilite $comptabilite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comptabilite $comptabilite)
    {
        //
    }
    
     /**
     * Remove the specified resource from storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function multipleDestroy(Request $request)
    {
        // dd($request->all());
        // if (Auth::user()->can('destroy-categories-approvisionnements')) {
            if ($request->ids) {
                $ids = $request->ids;
                $count = 0;
                foreach ($ids as $id) {
                    $comptabilite = Comptabilite::find($id);
                    // ActivityLogger::activity("Suppression de l'entree comptable :" . $comptabilite->commentaire.' par l\'utilisateur :' . Auth::user()->name);
                    $comptabilite->delete();
                    $count++;
                }
                $message = $count . ' entrée(s) comptabe supprimée(s) avec succès';
            } else {
                $message = "Aucune entrée comptable n'a été supprimé";
            }
            return redirect()->back()->with('success', $message);
        // } else {
            // return back()->with('error', 'Vous n\'avez pas ce droit');
        // }
    }
}
