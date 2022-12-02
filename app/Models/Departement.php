<?php
/*
Auteur : Yvon Gosselin
Date : Novembre 2022
Description : Modèle Departement
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $table = "departement";
    use HasFactory;

    //Récupère la région du département
    public function region()
    {
        return $this->belongsTo('App\Models\Region', 'region_id');
    }
}
