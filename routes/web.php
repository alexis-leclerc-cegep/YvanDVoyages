<?php
/*
Auteur : Yvon Gosselin
Date : novembre 2022
Description : Routes de l'application YvanD Voyages assurant la gestion vers les controleurs
*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\VoyageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\VenteController;

// Routes d'authentification
Route::get('/connecter',       [Controller::class, 'connecter'])->name('connecter');
Route::get('/deconnecter',     [Controller::class, 'deconnecter'])->name('deconnecter');
Route::post('/authentifier',    [Controller::class, 'authentifier'])->name('authentifier');

// ROUTES Application e-commerce
// ... pour la gestion des voyages
Route::get('/',                     [VoyageController::class, 'afficher'])->name('voyage.afficher');
Route::get('/apropos',              [VoyageController::class, 'apropos'])->name('voyage.apropos');
Route::get('/voyage',               [VoyageController::class, 'afficher'])->name('voyage.afficher');
Route::get('voyage/detailler/{id}', [VoyageController::class, 'detailler'])->name('voyage.detailler');

// ... pour les clients
Route::get('/client/creerCompte',           [ClientController::class, 'creerCompte'])->name('client.creerCompte');
Route::post('/client/inscrire',             [ClientController::class, 'inscrire'])->name('client.inscrire');
Route::get('/client/afficher',              [ClientController::class, 'afficher'])->name('client.afficher');
Route::get('/client/historique',            [ClientController::class, 'historique'])->name('client.historique');
Route::post('/client/modifier',        [ClientController::class, 'modifier'])->name('client.modifier');
Route::get('/client/desinscrire/{id}',      [ClientController::class, 'desinscrire'])->name('client.desinscrire');

// pour les paniers
Route::post('/panier/ajouter',              [PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::get('/panier/afficher',              [PanierController::class, 'afficher'])->name('panier.afficher');
Route::get('/panier/paiement/',             [PanierController::class, 'payer'])->name('panier.payer');
Route::post('/panier/processer/',             [PanierController::class, 'processer'])->name('panier.processer');
Route::get('/panier/vider/{id}',            [PanierController::class, 'vider'])->name('panier.vider');
Route::get('/panier/supprimer/{id}',        [PanierController::class, 'supprimer'])->name('panier.supprimer');
Route::post('/panier/modifier/{id}',        [PanierController::class, 'modifier'])->name('panier.modifier');


// pour les ventes
Route::get('/admin/vente/lister',           [VenteController::class, 'lister'])->name('vente.lister');


// ROUTES Application administrateur
// ... pour l'Administration des clients
Route::get('/admin/client/lister',          [ClientController::class, 'adminLister'])->name('admin.client.lister');
Route::get('/admin/client/detailler/{id}',  [ClientController::class, 'adminDetailler'])->name('admin.client.detailler');
Route::get('/admin/client/ajouter',         [ClientController::class, 'adminAjouter'])->name('admin.client.ajouter');
Route::post('/admin/client/modifier',  [ClientController::class, 'adminModifier'])->name('admin.client.modifier');
Route::get('/admin/client/supprimer/{id}',  [ClientController::class, 'adminSupprimer'])->name('admin.client.supprimer');

// Routes pour l'Administration des voyages
Route::get('/admin/voyage/lister',          [VoyageController::class, 'adminLister'])->name('admin.voyage.lister');
Route::get('/admin/voyage/creer',         [VoyageController::class, 'adminCreer'])->name('admin.voyage.creer');
Route::get('/admin/voyage/detailler/{id}',  [VoyageController::class, 'adminDetailler'])->name('admin.voyage.detailler');
Route::post('/admin/voyage/ajouter',         [VoyageController::class, 'adminAjouter'])->name('admin.voyage.ajouter');
Route::post('/admin/voyage/modifier/{id}',  [VoyageController::class, 'adminModifier'])->name('admin.voyage.modifier');
Route::get('/admin/voyage/supprimer/{id}',  [VoyageController::class, 'adminSupprimer'])->name('admin.voyage.supprimer');