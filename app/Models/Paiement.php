<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $table = 'paiement';

    protected $fillable = ['datePaiement', 'montantPaiement']; //Champs modifiables
    use HasFactory;

    public function vente(){
        return $this->belongsTo(Vente::class);
    }
}
