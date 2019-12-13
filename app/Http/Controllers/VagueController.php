<?php

namespace App\Http\Controllers;

use App\Vague;
use App\Approvisionnement;
use App\CategorieApprovisionnement;
use Illuminate\Http\Request;

class VagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vagues = Vague::all()->reverse();
        $approvisionnements = Approvisionnement::all();
        $categories_approvisionnements = CategorieApprovisionnement::all();
        return view("vagues.index", compact("vagues", "categories_approvisionnements", "approvisionnements"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("vagues.create", compact("vagues"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vague = new Vague();
        $vague->nom = $request->nom;
        $vague->description = $request->description;
        $vague->approvisionnement_id = Approvisionnement::find($request->approvisionnement)->id;
        $vague->quantite = Approvisionnement::find($request->approvisionnement)->quantite;
        $vague->etat = 1;
        $vague->save();
        // $vague->approvisionnement()->associate(Approvisionnement::find($request->approvisionnement));
        // $vague->approvisionnement()->match(Approvisionnement::find($request->approvisionnement));
        // Approvisionnement::find($request->approvisionnement)->vague()->associate($vague);
        return redirect()->back()->with("success", "La vague a bien été créée");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vague  $vague
     * @return \Illuminate\Http\Response
     */
    public function show(Vague $vague)
    {
        $page = "approvisionnement";
        return view("vagues.show", compact("vague", "page"));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vague  $vague
     * @return \Illuminate\Http\Response
     */
    public function edit(Vague $vague)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vague  $vague
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vague $vague)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vague  $vague
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vague $vague)
    {
        //
    }

    public function approvisionnement(Vague $vague){
        $page = "approvisionnement";
        return view("vagues.show", compact("vague","page"));
    }

    public function comptabilite(Vague $vague){
        $page = "comptabilite";
        return view("vagues.show", compact("vague","page"));
    }
}
