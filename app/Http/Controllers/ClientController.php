<?php
/*
Auteur : Yvon Gosselin
Date : Novembre 2022
Description : Controleur du modèle Client
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Province;
use App\Models\Client;
use App\Models\Vente;
use App\Models\PremierContact;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
// ************************************************************************
// SECTION E-COMMERCE
// ************************************************************************
    //Fonction de connexion du client au site
    public function creerCompte(Request $request) {
        $toutLesProvinces = Province::all();
        $toutLesPremiersContacts = PremierContact::all();

        return view('client/inscrire')->with('toutLesProvinces', $toutLesProvinces)
                                      ->with('toutLesPremiersContacts', $toutLesPremiersContacts);
    }

    public function afficher(){
        $client = Client::find(session('client_id'));
        return view('/client/afficher', ['client' => $client, 'toutLesProvinces' => Province::all(), 'toutLesPremiersContacts' => PremierContact::all()]);
    }

    //Fonction d'inscription du client au site et d'ajout d'un client de l'administration
    public function inscrire(Request $request){
        // Valdation des données
        $request->validate([
           'courriel' => ['required', 'string', 'min:5', 'max:35' ],    
           'prenom' => ['required', 'string',  'min:3', 'max:10'],
           'nom' => ['required', 'string',  'min:3', 'max:10'],      
           'motDePasse' => ['required', 'string',  'min:2', 'max:35'],
           'adresse' => ['required', 'string',  'min:5', 'max:28'],      
           'ville' => ['required', 'string',  'min:2', 'max:19'], 
           'codePostal' => ['required', 'string',  'min:7', 'max:7'], 
           'telephone' => ['required', 'string',  'min:10', 'max:14'], 
           'genre' => ['required', 'string',  'min:1', 'max:1'], 
           'province' => ['required', 'integer'], 
           'premierContact' => ['required', 'integer']
       ]);
       // Récupération des infos et ajout à la BD
       $nouveauClient = new Client;
       $nouveauClient->courriel = $request->input('courriel');
       $nouveauClient->prenom = $request->input('prenom');
       $nouveauClient->nom = $request->input('nom');
       $nouveauClient->motDePasse = $request->input('motDePasse');
       $nouveauClient->adresse = $request->input('adresse');
       $nouveauClient->ville = $request->input('ville');
       $nouveauClient->CP = $request->input('codePostal');
       $nouveauClient->telephone = $request->input('telephone');
       $nouveauClient->genre = $request->input('genre');
       $nouveauClient->province_id = $request->input('province');
       $nouveauClient->premierContact_id = $request->input('premierContact');
       $nouveauClient->save();

       return redirect()->route('connecter');
   }


// ************************************************************************
// SECTION ADMINISTRATION
// ************************************************************************

    //Fonction d'affichage de la liste des clients de l'administration
    public function adminLister (Request $request){
        if($request->session()->get('admin')==1){
            
            return view('admin/client/lister');
        }
        else{
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }

    //Fonction d'affichage des détails de l'administration
    public function adminDetailler(Request $request, $id){
        if($request->session()->get('admin')==1){
            $client = Client::find($id);
            return view('admin/client/detailler')->with(['client' => $client, 'toutLesProvinces' => Province::all(), 'toutLesPremiersContacts' => PremierContact::all()]);

        }
        else{
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }


    //Fonction de modification d'un client de l'administration
    public function adminModifier(Request $request){
        if($request->session()->get('admin')==1){
            // Valdation des données
            $request->validate([
                'prenom' => ['required', 'string',  'min:3', 'max:10'],
                'nom' => ['required', 'string',  'min:3', 'max:10'],      
                'adresse' => ['required', 'string',  'min:5', 'max:28'],      
                'ville' => ['required', 'string',  'min:2', 'max:19'], 
                'codePostal' => ['required', 'string',  'min:7', 'max:7'], 
                'telephone' => ['required', 'string',  'min:10', 'max:14'], 
                'genre' => ['required', 'string',  'min:1', 'max:1'], 
                'province' => ['required', 'integer'], 
                'premierContact' => ['required', 'integer'],
                'id' => ['required', 'integer']
            ]);

            $client = Client::find($request->input('id'));
            $client->prenom = $request->input('prenom');
            $client->nom = $request->input('nom');
            $client->adresse = $request->input('adresse');
            $client->ville = $request->input('ville');
            $client->CP = $request->input('codePostal');
            $client->telephone = $request->input('telephone');
            $client->genre = $request->input('genre');
            $client->province_id = $request->input('province');
            $client->premierContact_id = $request->input('premierContact');
            $client->save();
            return back()->with('message', 'Le client a été modifié avec succès.');
        }
        else{
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }


    //Fonction de suppression d'un client de l'administration
    public function adminSupprimer(Request $request, $id)
    {
        if($request->session()->get('admin')==1){
            $ventes = Vente::where('client_id', $id)->count();
            if($ventes == 0){
                $client = Client::find($id);
                $client->delete();
                return back()->with('message', 'Client supprimé.');  
            }
            else{
                return back()->with('message', 'Impossible de supprimer le client. Ventes associées!');
            }
        }
        else{
            return redirect()->route('voyage.afficher')->with('message', 'Accès refusé.');
        }
    }
}
