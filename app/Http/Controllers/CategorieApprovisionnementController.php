<?php

namespace App\Http\Controllers;

use App\CategorieApprovisionnement;
use Illuminate\Http\Request;

class CategorieApprovisionnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories_approvisionnements = CategorieApprovisionnement::all();
        return view("categories_approvisionnements.index", compact("categories_approvisionnements"));
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
        $CategorieApprovisionnement = new CategorieApprovisionnement();
        $CategorieApprovisionnement->libelle = $request->libelle;
        $CategorieApprovisionnement->description = $request->description;
        $CategorieApprovisionnement->save();
        return redirect()->back()->with(['success' => "La nouvelle catégorie a bien été enregistrée"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategorieApprovisionnement  $categorieApprovisionnement
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieApprovisionnement $categorieApprovisionnement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategorieApprovisionnement  $categorieApprovisionnement
     * @return \Illuminate\Http\Response
     */
    public function edit(CategorieApprovisionnement $categorieApprovisionnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategorieApprovisionnement  $categorieApprovisionnement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategorieApprovisionnement $categorieApprovisionnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategorieApprovisionnement  $categorieApprovisionnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorieApprovisionnement $categorieApprovisionnement)
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
        // if (Auth::user()->can('destroy-categories-approvisionnements')) {
            if ($request->ids) {
                $ids = $request->ids;
                $count = 0;
                foreach ($ids as $id) {
                    $categorieApprovisionnement = CategorieApprovisionnement::find($id);
                    // ActivityLogger::activity("Suppression de la catégorie d'approvisionnement :" . $categorieApprovisionnement->nom . ' par l\'utilisateur :' . Auth::user()->name);
                    $categorieApprovisionnement->delete();
                    $count++;
                }
                $message = $count . ' catégories(s) supprimée(s) avec succès';
            } else {
                $message = "Aucune catégorie n'a été supprimée";
            }
            return redirect()->route("categories_approvisionnements.index")->with('success', $message);
        // } else {
            // return back()->with('error', 'Vous n\'avez pas ce droit');
        // }
    }
}
