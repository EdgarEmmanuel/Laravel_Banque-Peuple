<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class compte_bloque extends Model
{
    public function updateSoldeCompte(int $montant,int $idCompte){
        //initialize the variable 
        $account_locked = null;

        try {
             //we get the true account 
            $account_locked = DB::update("UPDATE  compte_bloque 
            set solde = solde + ? where id_compte=?",[$montant,$idCompte]);

        } catch (\Throwable $th) {
            //we set the variable to null if there is an error 
            $account_locked = null;
        }
       
       return $account_locked;
    }
}
