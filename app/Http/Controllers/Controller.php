<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function connecter(){
        return view('connecter'); 
    }

    public function authentifier(Request $request){
        $request->validate([
            'courriel' => ['required', 'string', 'min:5', 'max:35' ] ,   
            'motDePasse' => ['required', 'string',  'min:5', 'max:35']
        ]);

        $courriel = $request->input('courriel');
        $motDePasse = $request->input('motDePasse');

        $user = Client::find($courriel, $motDePasse);

        dd ($user);
        /*
            return redirect()->route('accueil');
        }else{
            return redirect()->route('connecter');
        }
        */
    }
    public function apropos(){

    }
    
}
