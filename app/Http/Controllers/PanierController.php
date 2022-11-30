<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Panier;
use Illuminate\Support\Facades\Redirect;

class PanierController extends Controller
{
    //

    function afficher(){
        $client = Client::find(session('client_id'));
        return view('/client/panier/afficher', ['client' => $client]);
    }

    function payer(){
        $client = Client::find(session('client_id'));
        return view('/client/panier/payer', ['client' => $client]);
    }

    function processer(Request $request){
        $request->validate(
            [
                'titulaire' => 'required',
                'numeroCarte' => 'required',
                'ccv' => 'required',
                'dateExpirationAnnee' => 'required',
                'dateExpirationMois' => 'required'
            ]
        );
        $client = Client::find(session('client_id'));
        $client->vente =  $client->panier;
        $client->vente->save();
        return Redirect::to('/voyage', ['message' => 'Paiement effectué avec succès']);
    }

    function supprimer($id){
        Panier::find($id)->delete();
        return Redirect::back();
    }

    function modifier($id, Request $request) {
        $panier = Panier::find($id);
        $panier->quantite = $request->input('quantite');
        $panier->save();
        return Response('OK', 200);
    }

    function ajouter(Request $request)
    {
        $request->validate([
            'voyage_id' => 'required',
            'client_id' => '',
            'quantite' => 'required',
        ]);

        $panier = new Panier();
        $panier->ip_client = 'TBD';
        $panier->voyage_id = $request->voyage_id;
        $panier->client_id = session('client_id');
        $panier->quantite = $request->quantite;

        $panier->save();
        return Redirect::back()->with('message','Voyage ajouté au panier!');
    }


}
