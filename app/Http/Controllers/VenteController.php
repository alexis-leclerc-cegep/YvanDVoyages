<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VenteController extends Controller
{
    //

    public function lister(){
        return view('admin/vente/lister');
    }
}
