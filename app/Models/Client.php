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

    public function panier()
    {
        return $this->hasMany(Panier::class);
    }



    public function vente()
    {
        return $this->hasMany(Vente::class);
    }

    public function totalPanier(){
        $total = 0;
        foreach($this->panier as $item){
            $total += $item->quantite * $item->voyage->prix;
        }
        return $total;
    }

    //Récupère la province du client
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    //Récupère le premier contact du client
    public function premierContact()
    {
        return $this->belongsTo(PremierContact::class, 'premierContact_id');
    }

}
