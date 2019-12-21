<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    //
    // Route::get('/', function () {
    //     return view('layouts.app');
    // });
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name("logout");

    // HomeController
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/parametres', 'HomeController@parametres')->name('parametres');


    // UserController
    Route::resource('users', 'UserController');
    Route::post('/users/multipleDestroy', 'UserController@multipleDestroy')->name('users.multipleDestroy');


    // ApprovisionnementController
    Route::resource('approvisionnements', 'ApprovisionnementController');
    Route::post('/approvisionnements/multipleDestroy', 'ApprovisionnementController@multipleDestroy')->name('approvisionnements.multipleDestroy');
    
    // CategorieApprovisionnementController
    Route::resource('categories_approvisionnements', 'CategorieApprovisionnementController');
    Route::post('/categories_approvisionnements/multipleDestroy', 'CategorieApprovisionnementController@multipleDestroy')->name('categories_approvisionnements.multipleDestroy');
    

    // FournisseurController
    Route::resource('fournisseurs', 'FournisseurController');
    Route::post('/fournisseurs/multipleDestroy', 'FournisseurController@multipleDestroy')->name('fournisseurs.multipleDestroy');
  

    // ClientController
    Route::resource('clients', 'ClientController');
    Route::post('/clients/multipleDestroy', 'ClientController@multipleDestroy')->name('clients.multipleDestroy');

    // CommandeController
    Route::resource('commandes', 'CommandeController');
    Route::post('/commandes/multipleDestroy', 'CommandeController@multipleDestroy')->name('commandes.multipleDestroy');
    Route::post('/commandes/paiement', 'CommandeController@paiement')->name('commandes.paiement');
    Route::post('/commandes/livraison', 'CommandeController@livraison')->name('commandes.livraison');
    
    // PerteController
    Route::resource('pertes', 'PerteController');
    Route::post('/pertes/multipleDestroy', 'PerteController@multipleDestroy')->name('pertes.multipleDestroy');
    
    // vagueController
    Route::resource('vagues', 'VagueController');
    Route::get('vagues/{vague}/approvisionnement', 'VagueController@approvisionnement')->name("vagues.approvisionnement");
    Route::get('vagues/{vague}/comptabilite', 'VagueController@comptabilite')->name("vagues.comptabilite");


    
    // RoleController
    Route::resource('roles', 'RoleController');
    Route::post('/roles/multipleDestroy', 'RoleController@multipleDestroy')->name('roles.multipleDestroy');
    Route::post('/roles/revokeMember/{role}', 'RoleController@revokeUser')->name('roles.revoke');
    Route::post('/roles/assignMember/{role}', 'RoleController@assignUser')->name('roles.assign');
    Route::post('/roles/revokePermission/{role}', 'RoleController@revokePermission')->name('roles.revokePermission');
    Route::post('/roles/assignPermission/{role}', 'RoleController@assignPermission')->name('roles.assignPermission');
    
    // PermissionController
    Route::resource('permissions', 'PermissionController');
    Route::post('/permissions/multipleDestroy', 'PermissionController@multipleDestroy')->name('permissions.multipleDestroy');
    Route::post('/permissions/multipleDestroy', 'PermissionController@multipleDestroy')->name('permissions.multipleDestroy');
    Route::post('/permissions/revokeMember/{permission}', 'PermissionController@revokeUser')->name('permissions.revoke');
    Route::post('/permissions/assignMember/{permission}', 'PermissionController@assignUser')->name('permissions.assign');
    Route::post('/permissions/assignRole/{permission}', 'PermissionController@assignRole')->name('permissions.assignRole');
    Route::post('/permissions/revokeRole/{permission}', 'PermissionController@revokeRole')->name('permissions.revokeRole');
    
    // CategoriePermissionController
    Route::resource('categories', 'CategoriePermissionController');
    Route::post('/categories/multipleDestroy', 'CategoriePermissionController@multipleDestroy')->name('categories.multipleDestroy');
    
});
