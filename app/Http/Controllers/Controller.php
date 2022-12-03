<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function connecter(){
        return view('connecter'); 
    }

    public function deconnecter(){
        session()->flush();
        return redirect()->route('voyage.afficher')->with('message', 'Vous êtes déconnecté.');
    }

    public function authentifier(Request $request){
        $request->validate([
            'courriel' => ['required', 'string', 'min:5', 'max:35' ] ,   
            'motDePasse' => ['required', 'string',  'min:2', 'max:35']
        ]);

        $courriel = $request->input('courriel');
        $motDePasse = $request->input('motDePasse');

        $client = Client::where(['courriel' => $courriel, 'motDePasse' => $motDePasse])->first();

        if($client != null){
            if($client->admin == 1)
            {
                Session(['admin' => true]);
                Session(['client_id' => $client->id]);
                return redirect()->route('admin.client.lister');
            }
            else{
                Session(['admin' => false]);
                Session(['client_id' => $client->id]);
                return redirect()->route('voyage.afficher');
            }
        }else{
            return redirect()->route('connecter')->with('message', 'Courriel ou mot de passe invalide.');
        }
    }
    public function apropos(){
        dd(Session('client_id'));
    }
    
}
