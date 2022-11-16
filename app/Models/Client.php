<?php
/*
Auteur : Yvon Gosselin
Date : Novembre 2022
Description : Modèle Client
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $fillable = ['prenom','nom', 'motDePasse', 'adresse', 'ville', 'CP', 'telephone', 'courriel', 'genre', 'province_id', 'premierContact_id']; //Champs modifiables
    public $timestamps = false;  //Utilisation de created_at et updated_at
    use HasFactory;

    //Récupère la province du client

    //Récupère le premier contact du client

}
