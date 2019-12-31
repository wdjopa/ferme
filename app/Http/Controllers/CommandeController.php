<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Comptabilite;
use App\Paiement;
use App\Vague;
use Illuminate\Support\Facades\Auth;
use App\Livraison;
use Illuminate\Http\Request;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class CommandeController extends Controller
{
    use ActivityLogger;
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
            return redirect()->back()->with("error", "La quantité demandée pour l'achat n'est plus disponible. Veuillez vous réapprovisionner");
        }
        else{
            $commande = new Commande();
            $commande->vague_id = $request->vague;
            $commande->client_id = $request->client;
            $commande->quantite = $request->quantite;
            $commande->cout_total = $request->total;
            $commande->description = $request->description;
            
            $paiement = new Paiement();
            $livraison = new Livraison();
            $paiement->restant = $commande->cout_total;
            $paiement->save();
            $livraison->save();
            $commande->paiement_id = $paiement->id;
            $commande->livraison_id = $livraison->id;

            $commande->save();
            
            $vague->quantite = $vague->quantite - $commande->quantite;
            $vague->save();
            ActivityLogger::activity("Enregistrement d'une nouvelle commande  par l\'utilisateur :" . Auth::user()->name);
            
            
            // dd($commande);
            return redirect()->back()->with("success", "La commande a bien été enregistrée");
        }

    }
    /**
     * Update paiement value.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function paiement(Request $request)
    {
        $commande = Commande::findOrFail($request->commande);
        $paiement = Paiement::findOrFail($commande->paiement_id);
        // dd($request->all());
        $paiement->restant -= $request->total;
        if($paiement->restant == 0){
            $paiement->etat = 2;
        }
        else if($paiement->restant < $commande->cout_total){
            $paiement->etat = 1;
        }
        if(strlen($request->description)>0)
           $paiement->commentaire = $paiement->commentaire . "--------------" . $request->description;
        $paiement->save();
        
        $comptabilite = new Comptabilite();
        $comptabilite->depense = false;
        $comptabilite->recette = true;
        $comptabilite->auto = true;
        $comptabilite->montant = $request->total;
        $comptabilite->date = date('Y-m-d H:i:s');
        $comptabilite->categorie = "paiement";
        $comptabilite->categorie_id = $paiement->id;
        $comptabilite->commentaire = "Nouveau paiement pour la commande ".$paiement->commande->id;
        $comptabilite->save();
        ActivityLogger::activity("Enregistrement d'un nouveau paiement pour la commande N°".$commande->id." par l\'utilisateur :" . Auth::user()->name);

        return redirect()->back()->with("success", "Paiement mis à jour avec succès");
    }

    /**
     * Update paiement value.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function livraison(Request $request)
    {
        $livraison = Livraison::findOrFail($request->livraison);
        // dd($commande);
        $livraison->etat = $request->etat;
        $livraison->save();
        return redirect()->back()->with("success", "L'état de la livraison a été mis à jour avec succès");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
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
                    $commande = commande::find($id);
                    
                    $vague->quantite = $vague->quantite + $commande->quantite;
                    $vague->save();
                    ActivityLogger::activity("Suppression de la commande n°" . $commande->id . ' par l\'utilisateur :' . Auth::user()->name);
                    $commande->delete();
                    $count++;
                }
                $message = $count . ' commande(s) supprimée(s) avec succès';
            } else {
                $message = "Aucun commande n'a été supprimée";
            }
            return redirect()->back()->with('success', $message);
        // } else {
            // return back()->with('error', 'Vous n\'avez pas ce droit');
        // }
    }
}
