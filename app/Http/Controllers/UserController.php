<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view("users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (Auth::user()->can('store-users')) {
        // $request->validate([
        //     'prenom' => 'required',
        //     'nom' => 'required',
        //     'email' => 'required|unique:users',
        //     'tel' => 'required|unique:users',
        //     'titre' => 'required',
        // ]);
        // dd($request->all());
        $user = new User();
        $user->prenom = $request->prenom;
        $user->nom = $request->nom;
        $user->fullname = $request->prenom . ' ' . $request->nom;
        $user->name = $request->prenom . ' ' . $request->nom;
        $user->email = $request->email;
        $user->tel = htmlentities( $request->tel);
        $user->titre = $request->titre;
        $user->note = $request->note;
        $user->datenaissance = $request->datenaissance;
        $user->sexe = $request->sexe;
        $user->cni = $request->cni;
        // $user->team_id = 0;
        $user->password =  Hash::make('elevage');
        // $path = $request->file('avatar')->store('avatars', 'public');
        // $user->avatar = $path;
        $user->save();
        // $user->teams()->sync($request->teams);
        // $user->assignRole('collaborateur');
        // ActivityLogger::activity("Ajout d'un nouvel utilisateur ID:" . $user->id . ' par l\'utilisateur ID:' . Auth::id());
        return redirect()->back()->with(['success' => "Le nouvel employé a bien été enregistré", 'sendmailto' => $user->email]);
        // }
        //  else {
        //     return back()->with('error', "Vous n'avez pas ce droit");
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
