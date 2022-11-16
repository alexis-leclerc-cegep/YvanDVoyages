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

// Routes d'authentification
Route::get('/connecter',        [Controller::class, 'connecter'])->name('connecter');
Route::post('/deconnecter',     [Controller::class, 'deconnecter'])->name('deconnecter');

// ROUTES Application e-commerce
// ... pour la gestion des voyages
Route::get('/',                     [VoyageController::class, 'afficher'])->name('voyage.afficher');
Route::get('/apropos',              [VoyageController::class, 'apropos'])->name('voyage.apropos');
Route::get('/voyage',               [VoyageController::class, 'afficher'])->name('voyage.afficher');
Route::get('voyage/detailler/{id}', [VoyageController::class, 'detailler'])->name('voyage.detailler');

// ... pour les clients
Route::get('/client/creerCompte',           [ClientController::class, 'creerCompte'])->name('client.creerCompte');
Route::post('/client/inscrire',             [ClientController::class, 'inscrire'])->name('client.inscrire');
Route::post('/client/modifier/{id}',        [ClientController::class, 'modifier'])->name('client.modifier');
Route::get('/client/desinscrire/{id}',      [ClientController::class, 'desinscrire'])->name('client.desinscrire');



// ROUTES Application administrateur
// ... pour l'Administration des clients
Route::get('/admin/client/lister',          [ClientController::class, 'adminLister'])->name('admin.client.lister');
Route::get('/admin/client/detailler/{id}',  [ClientController::class, 'adminDetailler'])->name('admin.client.detailler');
Route::get('/admin/client/ajouter',         [ClientController::class, 'adminAjouter'])->name('admin.client.ajouter');
Route::post('/admin/client/modifier/{id}',  [ClientController::class, 'adminModifier'])->name('admin.client.modifier');
Route::get('/admin/client/supprimer/{id}',  [ClientController::class, 'adminSupprimer'])->name('admin.client.supprimer');

// Routes pour l'Administration des voyages
Route::get('/admin/voyage/lister',          [VoyageController::class, 'adminLister'])->name('admin.voyage.lister');
Route::get('/admin/voyage/ajouter',         [VoyageController::class, 'adminAjouter'])->name('admin.voyage.ajouter');
Route::post('/admin/voyage/modifier/{id}',  [VoyageController::class, 'adminModifier'])->name('admin.voyage.modifier');
Route::get('/admin/voyage/supprimer/{id}',  [VoyageController::class, 'adminSupprimer'])->name('admin.voyage.supprimer');

