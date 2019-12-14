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

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/parametres', 'HomeController@parametres')->name('parametres');


    Route::resource('users', 'UserController');
    Route::post('/users/multipleDestroy', 'UserController@multipleDestroy')->name('users.multipleDestroy');


    Route::resource('approvisionnements', 'ApprovisionnementController');
    
    Route::resource('categories_approvisionnements', 'CategorieApprovisionnementController');
    Route::post('/categories_approvisionnements/multipleDestroy', 'CategorieApprovisionnementController@multipleDestroy')->name('categories_approvisionnements.multipleDestroy');
    
    Route::resource('fournisseurs', 'FournisseurController');
    Route::post('/fournisseurs/multipleDestroy', 'FournisseurController@multipleDestroy')->name('fournisseurs.multipleDestroy');
  
    Route::resource('clients', 'ClientController');
    Route::post('/clients/multipleDestroy', 'ClientController@multipleDestroy')->name('clients.multipleDestroy');

    Route::resource('commandes', 'CommandeController');
    Route::post('/commandes/multipleDestroy', 'CommandeController@multipleDestroy')->name('commandes.multipleDestroy');
    Route::post('/commandes/paiement', 'CommandeController@paiement')->name('commandes.paiement');
    Route::post('/commandes/livraison', 'CommandeController@livraison')->name('commandes.livraison');
    
    Route::resource('pertes', 'PerteController');
    Route::post('/pertes/multipleDestroy', 'PerteController@multipleDestroy')->name('pertes.multipleDestroy');
    
    Route::resource('vagues', 'VagueController');
    Route::get('vagues/{vague}/approvisionnement', 'VagueController@approvisionnement')->name("vagues.approvisionnement");
    Route::get('vagues/{vague}/comptabilite', 'VagueController@comptabilite')->name("vagues.comptabilite");

});
