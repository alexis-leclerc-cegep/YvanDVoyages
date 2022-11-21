<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panier;

class PanierController extends Controller
{
    //

    function chepotest(){
        $panier = Panier::where('client_id', session('client_id'))->get();
        return view('panier', ['panier' => $panier]);
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
        $panier->client_id = $request->client_id;
        $panier->quantite = $request->quantite;

        $panier->save();

        return redirect()->route('panier.afficher');
    }

    function afficher(){}
}
