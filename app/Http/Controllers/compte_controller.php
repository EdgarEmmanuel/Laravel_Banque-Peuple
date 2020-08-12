<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class compte_controller extends Controller
{

    private static function insertInCompte($num,$cle,$Ouvert,$idClient,$idRespo,$idAgence){
        $id = DB::table('comptes')->insertGetId([
            'num_compte' => $num,
            'cle_rib' => $cle,
            'date-ouverture' => $Ouvert,
            'id_client' => $idClient,
            'id_responsable' => $idRespo,
            'id_agence' => $idAgence
        ]);
        return $id;
    }

    private static function getNumCompte($choix){
        switch($choix){
            case "Epargne": 
                $num = DB::select("select count(idCompte) as numero from comptes where SUBSTR(num_compte,1,2)='CE' ");
                foreach($num as $n){
                    $numero = "CE".((int)$n->numero +1);
                }
            break;
            case "Bloque": 
                $num = DB::select("select count(idCompte) as numero from comptes where SUBSTR(num_compte,1,2)='CB' ");
                foreach($num as $n){
                    $numero = "CB".((int)$n->numero +1);
                }
            break;
            case "Courant": 
                $num = DB::select("select count(idCompte) as numero from comptes where SUBSTR(num_compte,1,2)='CC' ");
                foreach($num as $n){
                    $numero = "CC".((int)$n->numero +1);
                }
            break;
        }
        return $numero;
    }


    public function insertCompte(Request $request){
        $idClient = session("idClient");

        $idRespo = session("id_respo");

        $idAgence = session("idAgence");
        
        //fetch the type of account on the submit 
        $type = $request->typeCompte;

        switch($type){
            case "Epargne": 

                //validate all the field at the back
                $this->validate($request,[
                    'cle_rib' =>'required',
                    'numero_Agence' => 'required',
                    'dateOuvert' => 'required',
                    'souscription' => 'required',
                    'montant' => 'required'
                ]);

                //fetch the  numero of the account
                $num = self::getNumCompte("Epargne");


                //insert in  compte firstly
                $idCompte=self::insertInCompte($num,$request->cle_rib,$request->dateOuvert,$idClient,$idRespo,$idAgence);

                
                //secondly insert in compte_epargne
                    $res = DB::table('compte_epargne')->insert([
                        'id_compte' => $idCompte,
                        'solde' => $request->montant
                    ]);


                    //redirection after insertion
                    if($res!=0){
                        return redirect('/admin/cni')->with('success','INSERTION DU COMPTE EFFECTUE AVEC SUCCESS !! ');
                    }else{
                        return redirect('/admin/cni')->with('error',"ERREUR D'INSERTION DE COMPTE");
                    }
            break;
        }
    }
}
