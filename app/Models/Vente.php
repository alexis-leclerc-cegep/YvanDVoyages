<?php
/*
Auteur : Yvon Gosselin
Date : Novembre 2022
Description : Modèle Vente
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    protected $table = "vente";
    protected $fillable = ['dateVente', 'client_id', 'voyage_id', 'quantiteVoyageurs']; //Champs modifiables
    public $timestamps = false;  //Utilisation de created_at et updated_at
    use HasFactory;

}
