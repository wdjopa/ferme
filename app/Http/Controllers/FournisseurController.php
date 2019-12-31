<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;


class FournisseurController extends Controller
{
    use ActivityLogger;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = Fournisseur::all();
        return view("fournisseurs.index", compact("fournisseurs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("fournisseurs.create");
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:fournisseurs',
            'email' => 'required|unique:fournisseurs',
        ]);
        $fournisseur = new Fournisseur();
        $fournisseur->nom = $request->nom;
        $fournisseur->description = $request->description;
        $fournisseur->email = $request->email;
        $fournisseur->tel = $request->tel;
        $fournisseur->localisation = $request->localisation;
        $fournisseur->save();
        ActivityLogger::activity("Le fournisseur ".$fournisseur->nom." a bien été créé par ".Auth::user()->name);
        return redirect()->route("fournisseurs.index")->with(['success' => "Le nouveau fournisseur a bien été enregistré", 'sendmailto' => Auth::user()->email]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        return view("fournisseurs.edit", compact("fournisseur"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur)
    {
        return view("fournisseurs.edit", compact("fournisseur"));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        $fournisseur->nom = $request->nom;
        $fournisseur->description = $request->description;
        $fournisseur->email = $request->email;
        $fournisseur->tel = $request->tel;
        $fournisseur->localisation = $request->localisation;
        $fournisseur->save();
        ActivityLogger::activity("Le fournisseur ".$fournisseur->nom." a bien été mis à jour par ".Auth::user()->name);

        return redirect()->back()->with(['success' => "Le fournisseur ".$fournisseur->nom." a bien été mis à jour par ".Auth::user()->name, 'sendmailto' => Auth::user()->email]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
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
                    $fournisseur = Fournisseur::find($id);
                    ActivityLogger::activity("Suppression du fournisseur :" . $fournisseur->nom . ' par l\'utilisateur :' . Auth::user()->name);
                    $fournisseur->delete();
                    $count++;
                }
                $message = $count . ' fournisseur(s) supprimé(s) avec succès';
            } else {
                $message = "Aucun fournisseur n'a été supprimé";
            }
            return redirect()->route("fournisseurs.index")->with('success', $message);
        // } else {
            // return back()->with('error', 'Vous n\'avez pas ce droit');
        // }
    }
}
