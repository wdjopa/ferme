<?php

namespace App\Http\Controllers;

use App\Vague;
use App\Perte;
use App\Comptabilite;
use Illuminate\Http\Request;

class PerteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dd($request->vague);
        $vague = Vague::findOrFail($request->vague);

        if($vague->quantite < $request->quantite){
            return redirect()->back()->with("error", "La quantité demandée pour les pertes n'est plus disponible. Veuillez vous réapprovisionner");
        }
        else{
            $perte = new Perte();
            $perte->vague_id = $request->vague;
            $perte->quantite = $request->quantite;
            $perte->somme = $request->total;
            $perte->description = $request->description;
            
            $perte->save();
            
            $comptabilite = new Comptabilite();
            $comptabilite->depense = true;
            $comptabilite->recette = false;
            $comptabilite->auto = true;
            $comptabilite->montant = $request->prix_total;
            $comptabilite->date = $request->date;
            $comptabilite->categorie = "perte";
            $comptabilite->categorie_id = $approvisionnement->id;
            $comptabilite->commentaire = "Nouvelle perte de ".$request->quantite." ".$approvisionnement->categorieApprovisionnement->libelle."(s)";
            $comptabilite->save();
       
            $vague->quantite = $vague->quantite - $perte->quantite;
            $vague->save();
            
            ActivityLogger::activity("Nouvelle perte de ".$request->quantite." ".$approvisionnement->categorieApprovisionnement->libelle."(s) par l\'utilisateur :" . Auth::user()->name);
            
            // dd($commande);
            return redirect()->back()->with("success", "La perte a bien été enregistrée");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perte  $perte
     * @return \Illuminate\Http\Response
     */
    public function show(Perte $perte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perte  $perte
     * @return \Illuminate\Http\Response
     */
    public function edit(Perte $perte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perte  $perte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perte $perte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perte  $perte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perte $perte)
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
        $vague = Vague::findOrFail($request->vague);

        // if (Auth::user()->can('destroy-categories-approvisionnements')) {
            if ($request->ids) {
                $ids = $request->ids;
                $count = 0;
                foreach ($ids as $id) {
                    $perte = perte::find($id);
                    
            
                    $vague->quantite = $vague->quantite + $perte->quantite;
                    $vague->save();
                    ActivityLogger::activity("Suppression d'une perte :" . $perte->nom . ' par l\'utilisateur :' . Auth::user()->name);
                    $perte->delete();
                    $count++;
                }
                $message = $count . ' perte(s) supprimée(s) avec succès';
            } else {
                $message = "Aucun perte n'a été supprimée";
            }
            return redirect()->back()->with('success', $message);
        // } else {
            // return back()->with('error', 'Vous n\'avez pas ce droit');
        // }
    }
}
