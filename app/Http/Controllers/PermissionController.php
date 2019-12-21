<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\CategoriePermission;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class PermissionController extends Controller
{
    use ActivityLogger;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->can('list-permissions')){
            $permissions = Permission::orderBy('id', 'DESC')->get();     
            return view("permissions.index", compact('permissions'));
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
        if(Auth::user()->can('create-permissions')){
            $categories = CategoriePermission::all();
            $categorie_id = Input::get('categorie_id', 'clients');
            return view("permissions.create", compact('categories','categorie_id'));
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
        if(Auth::user()->can('store-permissions')){
            $request->validate([
                'name' => 'required|unique:permissions',
                'categorie_id' => 'required',
            ]);
            $request->name = str_replace(' ','-',$request->name);
            $permission = Permission::create(['name' => $request->name, 'description'=>$request->description, 'categorie'=>$request->categorie_id]);
            ActivityLogger::activity("Ajout d'une nouvelle permission ID:".$permission->id.'('.$permission->name.') par l\'utilisateur ID:'.Auth::id());

            if($request->stay){
                return redirect()->route("permissions.create",['categorie_id'=>$request->categorie_id])->with('success','La permission a bien été créée.');
            }
            else{
                return redirect()->route("permissions.index")->with('success', 'La permission a bien été créée.');
            }
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        if(Auth::user()->can('show-permissions')){
            $users = User::all();
            $teams = Team::all();
            $roles = Role::all();
            return view('permissions.show', compact('permission', 'roles', 'users', 'teams'));
            
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        if(Auth::user()->can('edit-permissions')){
            $categories = CategoriePermission::all();
            return view("permissions.edit", compact('permission', 'categories'));
            
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        if(Auth::user()->can('update-permissions')){
            ActivityLogger::activity("Modification des informations de la permission ID:".$permission->id.'('.$permission->name.') par l\'utilisateur ID:'.Auth::id().'('.Auth::user()->name.')');
            $request->name = str_replace(' ','-',$request->name);
            $permission->update($request->all());
            return redirect()->route("permissions.index", "all")->with('success','permission modifiée avec succès.');
            
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        if(Auth::user()->can('destroy-permissions')){
            ActivityLogger::activity("Suppression de la permission ID:".$permission->id.'('.$permission->name.') par l\'utilisateur ID:'.Auth::id()."(".Auth::user()->name.")");
            $permission->delete();
            return redirect()->route("permissions.index")->with('success', 'permission supprimée avec succès');
            
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
    public function assignUser(Request $request, Permission $permission)
    {
        if(Auth::user()->can('assign-permissions-to-user')){
            if($request->ids){
                $ids = $request->ids;
                foreach ($ids as $id) {
                    $user = User::find($id);
                    $user->givePermissionTo($permission->name);
                    ActivityLogger::activity("Le collaborateur ID:".$user->id.'('.$user->name.') a désormais la permission id:'.$permission->id.'('.$permission->name.') donnée par l\'utilisateur ID:'.Auth::id());
                }
                $message = sizeof($ids).' collaborateur(s) assigné(s) à la permission '.$permission->name.' avec succès';
            }
            else{
                $message = "Aucune action n'a été effectuée.";
            }
            // Envoyer un mail à la personne qui a recu la permission avec la liste des permissions possibles
            return redirect()->route("permissions.show", compact('permission'))->with('success',$message);
            
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
    public function revokeUser(Request $request, Permission $permission)
    {
        if(Auth::user()->can('revoke-permissions-to-user')){
            if($request->ids){
                $ids = $request->ids;
                foreach ($ids as $id) {
                    $user = User::find($id);
                    $user->revokePermissionTo($permission->name);
                    ActivityLogger::activity("Le collaborateur ID:".$user->id.'('.$user->name.') a désormais perdu la permission id:'.$permission->id.'('.$permission->name.') donnée par l\'utilisateur ID:'.Auth::id());
                }
                $message = sizeof($ids).' collaborateur(s) révoqué(s) à la permission '.$permission->name.' avec succès';
            }
            else{
                $message = "Aucune action n'a été effectuée.";
            }
            // Envoyer un mail à la personne qui a recu la permission
            return redirect()->route("permissions.show", compact('permission'))->with('success',$message);
            
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
    public function assignRole(Request $request, Permission $permission)
    {
        if(Auth::user()->can('assign-permissions-to-role')){
            if($request->ids){
                $ids = $request->ids;
                foreach ($ids as $id) {
                    $role = Role::find($id);
                    $role->givePermissionTo($permission->name);
                    ActivityLogger::activity("Le role ID:".$role->id.'('.$role->name.') a désormais la permission id:'.$permission->id.'('.$permission->name.') donnée par l\'utilisateur ID:'.Auth::id());
                }
                $message = sizeof($ids).' role(s) assigné(s) à la permission '.$permission->name.' avec succès';
            }
            else{
                $message = "Aucune action n'a été effectuée.";
            }
            // Envoyer un mail à la personne qui a recu le role avec la liste des permissions possibles
            return redirect()->route("permissions.show", compact('permission'))->with('success',$message);
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
    public function revokeRole(Request $request, Permission $permission)
    {
        if(Auth::user()->can('revoke-permissions-to-role')){
            if($request->ids){
                $ids = $request->ids;
                foreach ($ids as $id) {
                    $role = Role::find($id);
                    $role->revokePermissionTo($permission->name);
                    ActivityLogger::activity("Le role ID:".$role->id.'('.$role->name.') a désormais perdu la permission id:'.$permission->id.'('.$permission->name.') donné par l\'utilisateur ID:'.Auth::id());
                }
                $message = sizeof($ids).' role(s) révoqué(s) à la permission '.$permission->name.' avec succès';
            }
            else{
                $message = "Aucune action n'a été effectuée.";
            }
            return redirect()->route("permissions.show", compact('permission'))->with('success',$message);
        }else{
            return back()->with('error',"Vous n'avez pas ce droit");
        }
    }
}
