<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriePermission;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class CategoriePermissionController extends Controller
{
    use ActivityLogger;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->can('list-categories-permission')){
            $categories = CategoriePermission::all();
            return view("categories.index", compact('categories'));
        }
        else{
            return back()->with('error',"Vous n'avez pas ce droit");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->can('create-categories-permission')){
            return view("categories.create");
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->can('store-categories-permission')){
            $request->validate([
                'name' => 'required|unique:categorie_permissions',
            ]);
            $categorie = CategoriePermission::create(['name' => $request->name, 'description'=>$request->description]);
            ActivityLogger::activity("Ajout d'une nouvelle categorie ID:".$categorie->id.'('.$categorie->name.') par l\'utilisateur ID:'.Auth::id());
            return redirect()->route("categories.index")->with('success', 'La categorie a bien été créée.');
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriePermission  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->can('show-categories-permission')){
            $categorie = CategoriePermission::find($id);
            $permissions = Permission::all();
            return view('categories.edit', compact('categorie', 'permissions'));    
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        }    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriePermission  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->can('edit-categories-permission')){
            $categorie = CategoriePermission::find($id);
            return view("categories.edit", compact('categorie'));        
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        }
    }       

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriePermission  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->can('udpate-categories-permission')){
            $categorie = CategoriePermission::find($id);
            ActivityLogger::activity("Modification des informations de la catégorie ID:".$categorie->id.'('.$categorie->name.') par l\'utilisateur ID:'.Auth::id().'('.Auth::user()->name.')');
            $categorie->update($request->all());
            return redirect()->route("categories.index")->with('success','Categorie modifié avec succès.');
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriePermission  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->can('destroy-categories-permission')){
            $categorie = CategoriePermission::find($id);
            ActivityLogger::activity("Suppression de la catégorie ID:".$categorie->id.'('.$categorie->name.') par l\'utilisateur ID:'.Auth::id()."(".Auth::user()->name.")");
            $categorie->delete();
            return redirect()->route("categories.index")->with('success', 'Categorie supprimée avec succès');
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function multipleDestroy(Request $request)
    {
        if(Auth::user()->can('destroy-categories-permission')){
            if($request->ids){
                $ids = $request->ids;
                foreach ($ids as $id) {
                    $categorie = CategoriePermission::find($id);
                    ActivityLogger::activity("Suppression de la categorie ID:".$categorie->id.' par l\'utilisateur ID:'.Auth::id());
                    $categorie->delete();
                }
                $message = sizeof($ids).' categorie(s) supprimée(s) avec succès';
            }
            else{
                $message = "Aucune categorie n'a été supprimée";
            }
            return redirect()->route("categories.index")->with('success', $message);
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        }
    }
}
