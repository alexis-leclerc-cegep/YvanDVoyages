<?php
/*
Auteur : Yvon Gosselin
Date : Novembre 2022
Description : Modèle Voyage
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    protected $table = "voyage";
    protected $fillable = ['nomVoyage','dateDebut', 'duree', 'ville', 'prix', 'departement_id', 'categorie_id']; //Champs modifiables
    public $timestamps = false;  //Utilisation de created_at et updated_at

    use HasFactory;

    //Récupère la catégorie du voyage
    public function categorie()
    {
        return $this->belongsTo('App\Models\Categorie', 'categorie_id');
    }

    //Récupère le département du voyage
    public function departement()
    {
        return $this->belongsTo('App\Models\Departement', 'departement_id');
    }


}
