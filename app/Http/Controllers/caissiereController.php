<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\comptes ;

class caissiereController extends Controller
{
    private $_comptes;

    public function __construct(comptes $comptes)
    {
        $this->_comptes = $comptes;
    }

    public function insertDepot(Request $request){
        //get the variable form the form
        $montant = $request->get("montant");
        $numeroCompte = $request->get("numeroCompte");

        
        $data=$this->_comptes->getInfoCompte($numeroCompte);
        
        var_dump($data->cle_rib);
        die;
    }
}
