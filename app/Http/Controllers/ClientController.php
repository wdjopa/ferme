<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class ClientController extends Controller
{
    use ActivityLogger;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $clients = client::all();
        return view("clients.index", compact("clients"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("clients.create");
        
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
            'nom' => 'required|unique:clients',
            // 'email' => 'required|unique:clients',
        ]);
        $client = new client();
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->description = $request->description;
        $client->email = $request->email;
        $client->tel = $request->tel;
        $client->adresse = $request->localisation;
        $client->save();
        ActivityLogger::activity("Le client ".$client->nom." a été enregistré par ".Auth::user()->name);
        return redirect()->route("clients.index")->with(['success' => "Le nouveau client a bien été enregistré", 'sendmailto' => Auth::user()->email]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view("clients.show", compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view("clients.edit", compact('client'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->description = $request->description;
        $client->email = $request->email;
        $client->tel = $request->tel;
        $client->adresse = $request->localisation;
        $client->save();
        ActivityLogger::activity("Le client ".$client->nom." a bien été mis à jour par ".Auth::user()->name);
        return redirect()->back()->with(['success' => "Le client $client->nom a bien été mis à jour", 'sendmailto' => Auth::user()->email]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
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
                    $client = client::find($id);
                     ActivityLogger::activity("Suppression du client :" . $client->nom . ' par l\'utilisateur :' . Auth::user()->name);
                    $client->delete();
                    $count++;
                }
                $message = $count . ' client(s) supprimé(s) avec succès';
            } else {
                $message = "Aucun client n'a été supprimé";
            }
            return redirect()->route("clients.index")->with('success', $message);
        // } else {
            // return back()->with('error', 'Vous n\'avez pas ce droit');
        // }
    }
}
