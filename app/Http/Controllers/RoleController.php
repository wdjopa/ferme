<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class RoleController extends Controller
{
    use ActivityLogger;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->can('list-roles')){
            $roles = Role::orderBy('id', 'DESC')->get();
            return view("roles.index", compact('roles'));
        }else{
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
        if(Auth::user()->can('create-roles')){
            return view("roles.create");
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
        if(Auth::user()->can('store-roles')){
            $request->validate([
                'name' => 'required|unique:roles',
            ]);
            $role = Role::create(['name' => $request->name, 'description'=>$request->description]);
            ActivityLogger::activity("Ajout d'un nouveau rôle ID:".$role->id.'('.$role->name.') par l\'utilisateur ID:'.Auth::id());
            return redirect()->route("roles.index")->with('success', 'Le rôle a bien été créé.');
            
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        if(Auth::user()->can('show-roles')){
            $users = User::all();
            $teams = Team::all();
            $permissions = Permission::all();
            return view('roles.show', compact('role', 'users', 'teams', 'permissions'));
            
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if(Auth::user()->can('edit-roles')){
            return view("roles.edit", compact('role'));  
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if(Auth::user()->can('update-roles')){
            ActivityLogger::activity("Modification des informations du role ID:".$role->id.'('.$role->name.') par l\'utilisateur ID:'.Auth::id().'('.Auth::user()->name.')');
            $role->update($request->all());
            return redirect()->route("roles.index")->with('success','Role modifié avec succès.');
            
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if(Auth::user()->can('destroy-roles')){
            ActivityLogger::activity("Suppression du role ID:".$role->id.'('.$role->name.') par l\'utilisateur ID:'.Auth::id()."(".Auth::user()->name.")");
            $role->delete();
            return redirect()->route("roles.index")->with('success', 'Role supprimé avec succès'); 
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
        if(Auth::user()->can('destroy-roles')){
            if($request->ids){
                $ids = $request->ids;
                foreach ($ids as $id) {
                    $role = Role::find($id);
                    ActivityLogger::activity("Suppression du role ID:".$role->id.' par l\'utilisateur ID:'.Auth::id());
                    $role->delete();
                }
                $message = sizeof($ids).' role(s) supprimé(s) avec succès';
            }
            else{
                $message = "Aucun role n'a été supprimé";
            }
            return redirect()->route("roles.index")->with('success', $message);
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        } 
    }
    
    /**
     * Assign a role to the specified user.
     *
     * @param  \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function assignUser(Request $request, Role $role)
    {
        if(Auth::user()->can('assign-role-to-user')){
            if($request->ids){
                $ids = $request->ids;
                foreach ($ids as $id) {
                    $user = User::find($id);
                    $user->assignRole($role->name);
                    ActivityLogger::activity("Le collaborateur ID:".$user->id.'('.$user->name.') a désormais le role id:'.$role->id.'('.$role->name.') donné par l\'utilisateur ID:'.Auth::id());
                }
                $message = sizeof($ids).' collaborateur(s) assigné(s) au role '.$role->name.' avec succès';
            }
            else{
                $message = "Aucune action n'a été effectuée.";
            }
            // Envoyer un mail à la personne qui a recu le role avec la liste des permissions possibles
            return redirect()->route("roles.show", compact('role'))->with('success',$message);
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        } 
    }
    
    /**
     * Revoke a role to the specified user.
     *
     * @param  \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function revokeUser(Request $request, Role $role)
    {
        if(Auth::user()->can('revoke-role-to-user')){
            if($request->ids){
                $ids = $request->ids;
                foreach ($ids as $id) {
                    $user = User::find($id);
                    $user->removeRole($role->name);
                    ActivityLogger::activity("Le collaborateur ID:".$user->id.'('.$user->name.') a désormais perdu le role id:'.$role->id.'('.$role->name.') donné par l\'utilisateur ID:'.Auth::id());
                }
                $message = sizeof($ids).' collaborateur(s) révoqué(s) au role '.$role->name.' avec succès';
            }
            else{
                $message = "Aucune action n'a été effectuée.";
            }
            // Envoyer un mail à la personne qui a recu le role
            return redirect()->route("roles.show", compact('role'))->with('success',$message);
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        } 
    }
    
    /**
     * Assign a permission to the specified role.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function assignPermission(Request $request, Role $role)
    {
        if(Auth::user()->can('assign-permission-to-role')){
            if($request->ids){
                $ids = $request->ids;
                foreach ($ids as $id) {
                    $permission = Permission::find($id);
                    $role->givePermissionTo($permission->name);
                    ActivityLogger::activity("Le role ID:".$role->id.'('.$role->name.') a désormais la permission id:'.$permission->id.'('.$permission->name.') donnée par l\'utilisateur ID:'.Auth::id());
                }
                $message = sizeof($ids).' role(s) assigné(s) à la permission '.$permission->name.' avec succès';
            }
            else{
                $message = "Aucune action n'a été effectuée.";
            }
            // Envoyer un mail à la personne qui a recu le role avec la liste des permissions possibles
            return redirect()->route("roles.show", compact('role'))->with('success',$message);
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        } 
    }
    
    /**
     * Revoke a permission to the specified role.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function revokePermission(Request $request, Role $role)
    {
        if(Auth::user()->can('revoke-permission-to-role')){
            if($request->ids){
                $ids = $request->ids;
                foreach ($ids as $id) {
                    $permission = Permission::find($id);
                    $role->revokePermissionTo($permission->name);
                    ActivityLogger::activity("Le role ID:".$role->id.'('.$role->name.') a désormais perdu la permission id:'.$permission->id.'('.$permission->name.') donné par l\'utilisateur ID:'.Auth::id());
                }
                $message = sizeof($ids).' role(s) révoqué(s) à la permission '.$permission->name.' avec succès';
            }
            else{
                $message = "Aucune action n'a été effectuée.";
            }
            return redirect()->route("roles.show", compact('role'))->with('success',$message);
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        } 
    }
    
}
