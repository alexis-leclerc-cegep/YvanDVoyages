<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

use App\Models\Client;
use App\Models\Panier;
use App\Models\Vente;
use App\Models\Paiement;

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
        $vente = new Vente();
        //$vente->dateVente =  now();
        //$vente->voyage_id = $client->panier[0]->voyage_id;
        $vente->voyage_id = $client->panier[0]->voyage_id;
        $vente->quantiteVoyageurs = $client->panier[0]->quantite;
        $vente->client_id = session('client_id');
        $vente->dateVente = now();
        $vente->save();
        $paiement = new Paiement();
        $paiement->montantPaiement = $client->totalPanier();
        $paiement->datePaiement = now();
        $paiement->vente_id = $vente->id;
        $paiement->save();
        $panier = Panier::where('client_id', session('client_id'))->get();
        $panier->each->delete();
        return redirect()->route('voyage.afficher')->with('message', 'Votre paiement a été accepté.');
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
            'quantite' => 'required',
        ]);
        if (session('client_id') == null)
        {
            $errors = new MessageBag();

            // add your error messages:
            $errors->add('erreur', 'Désolé, vous devez être connecté pour ajouter un voyage au panier');
            return Redirect::back()->withErrors($errors);
        }

        if(Client::find(session('client_id'))->panier->count() != 0)
        {
            $errors = new MessageBag();

            // add your error messages:
            $errors->add('erreur', 'Désolé, vous ne pouvez pas ajouter plus d\'un voyage au panier');
            return Redirect::back()->withErrors($errors);

        }
        else
        {
            $panier = new Panier();
            $panier->ip_client = 'TBD';
            $panier->voyage_id = $request->voyage_id;
            $panier->client_id = session('client_id');
            $panier->quantite = $request->quantite;

            $panier->save();
            return Redirect::back()->with('message','Voyage ajouté au panier!');

        }
    }


}
