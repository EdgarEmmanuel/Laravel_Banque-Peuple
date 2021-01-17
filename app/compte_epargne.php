<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class compte_epargne extends Model
{
    public function updateCompteEpargne(int $montant , int $idCompte){
        $compte_epargne = null;

        try {
            $compte_epargne = DB::update("UPDATE compte_epargne 
            set solde = solde + ? where id_compte = ?",[$montant,$idCompte]);
        } catch (\Throwable $th) {
            $compte_epargne = null;
        }

        return $compte_epargne;
    }
}
