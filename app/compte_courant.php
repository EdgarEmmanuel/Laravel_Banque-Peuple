<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class compte_courant extends Model
{
    public  function updateSoldeCompteCourant(int $montant , int $idCompte){
        //initialize the variable 
        $compteCourant = null;

        try {
            $compteCourant = DB::update("UPDATE compte_courant
             set solde = solde + ? where id_compte = ?",[$montant , $idCompte ]);
        } catch (\Throwable $th) {
            $compteCourant = null;
        }

        return $compteCourant;
    } 
}
