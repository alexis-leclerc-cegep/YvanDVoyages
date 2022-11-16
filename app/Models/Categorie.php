<?php
/*
Auteur : Yvon Gosselin
Date : Novembre 2022
Description : Modèle Categorie
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categorie';
    use HasFactory;
}
