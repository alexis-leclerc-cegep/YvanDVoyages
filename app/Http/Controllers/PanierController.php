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
        //$panier = Panier::where('client_id', session('client_id'))->get();
        $client = Client::find(session('client_id'));
        dd($client->panier);
        return view('/client/panier/afficher', ['lesVoyagesDuPanier' => $client->panier]);
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
