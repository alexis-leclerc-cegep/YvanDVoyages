<?php
/*
Auteur : Yvon Gosselin
Date : Novembre 2022
Description : Modèle Categorie
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    protected $table = 'panier';
    public $timestamps = false;
    protected $fillable = ['ip_client', 'voyage_id', 'quantite', 'client_id'];
    use HasFactory;

    public function voyage()
    {
        return $this->belongsTo(Voyage::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function ventes()
    {
        return $this->hasMany(Vente::class);
    }

}
