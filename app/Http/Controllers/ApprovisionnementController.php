<?php

namespace App\Http\Controllers;

use App\Approvisionnement;
use App\CategorieApprovisionnement;
use App\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovisionnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 0)
    {
        $categories_approvisionnements = CategorieApprovisionnement::all();
        $approvisionnements = Approvisionnement::all();
        $fournisseurs = Fournisseur::all();
        // $page = "";
        return view("approvisionnements.index", compact("approvisionnements", "categories_approvisionnements", "fournisseurs", "page"));
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
        $approvisionnement = new Approvisionnement();
        $approvisionnement->quantite = $request->quantite;
        $approvisionnement->prix_total = $request->prix_total;
        $approvisionnement->date_approvisionnement = $request->date;
        $approvisionnement->description = $request->description;
        $approvisionnement->fournisseur_id = $request->fournisseur;
        $approvisionnement->categorie_approvisionnement_id = $request->categorie;
        $approvisionnement->save();
        // ActivityLogger::activity("Ajout d'un nouvel utilisateur ID:" . $user->id . ' par l\'utilisateur ID:' . Auth::id());
        return redirect()->back()->with(['success' => "Le nouvel employé a bien été enregistré", 'sendmailto' => Auth::user()->email]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function show(Approvisionnement $approvisionnement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function edit(Approvisionnement $approvisionnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Approvisionnement $approvisionnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Approvisionnement $approvisionnement)
    {
        //
    }
}
