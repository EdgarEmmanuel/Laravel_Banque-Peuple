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
            'date_ouverture' => $Ouvert,
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

            //when the type of the account is 'Courant'
            case "Courant": 
                $this->validate($request,[
                    'raison' => 'required',
                    'cle_rib' => 'required',
                    'montant' => 'required',
                    'Name_entreprise' => 'required',
                    'adresse_Entreprise' => 'required',
                    'dateOuvert' => 'required',
                    'agiosOBG' => 'required'
                ]);

                //fetch the number of compte_courant ath this moment 
                $numero_courant = self::getNumCompte("Courant");

                //retrieve the value of the agios
                $agios = DB::select(" select montant , id_agios from agios where description='entretien' ");
                foreach($agios as $ag){
                    $sal = $ag->montant;
                    $id_agios = $ag->id_agios;
                }

                //calculate the amount of money after the agios
                $final = (int)$request->montant - (int)$sal;


                //insert in  compte firstly
                $idCompte=self::insertInCompte($numero_courant,$request->cle_rib,$request->dateOuvert,$idClient,$idRespo,$idAgence);

                
                //secondly insert in the table compte_courant
                $resultat = DB::table('compte_courant')->insert([
                    'adresse_employeur' => $request->adresse_Entreprise,
                    'nom_entreprise' => $request->Name_entreprise,
                    'raison_sociale' => $request->raison,
                    'solde' => $final ,
                    'id_agios' => $id_agios,
                    'id_compte' => $idCompte
                ]);


                //redirection after insertion
                if($resultat!=0){
                    return redirect('/admin/cni')->with('success','INSERTION DU COMPTE EFFECTUE AVEC SUCCESS !! ');
                }else{
                    return redirect('/admin/cni')->with('error',"ERREUR D'INSERTION DE COMPTE");
                }

            break;

            case "Bloque" : 
                //validate the fields required for create compte_bloque
                $this->validate($request,[
                    'cle_rib' => 'required',
                    'numero_Agence' => 'required',
                    'dateOuvert' => 'required',
                    'montant' => 'required',
                    'dateDebloc' => 'required'
                ]);

                //fetch the numero_compte for the account bloque 
                $numero_bloque = self::getNumCompte("Bloque");

                //insert firstly in compte 
                $idCompte=self::insertInCompte($numero_bloque,
                $request->cle_rib,$request->dateOuvert,$idClient,$idRespo,$idAgence);

                //insert in table compte_bloque 
                $resultat = DB::table("compte_bloque")->insert([
                    'date_deblocage' => $request->dateDebloc,
                    'solde' => $request->montant,
                    'id_compte' => $idCompte
                ]);


                if($resultat!=0){

                     //insert in the operations 
                    $f = DB::table("operations")->insert([
                        "date_operation"=>$request->dateOuvert,
                        "type_operation"=>"DEPOT",
                        "montant"=>$request->montant,
                        "id_employe"=>$idRespo,
                        "id_compte"=>$idCompte
                    ]);

                    //redirection after insertion
                    if($f!=0){
                        return redirect('/admin/cni')->with('success','INSERTION DU COMPTE EFFECTUE AVEC SUCCESS !! ');
                    }else{
                        return redirect('/admin/cni')->with('error',"ERREUR D'INSERTION DE COMPTE");
                    }
                    
                }else{
                    return redirect('/admin/cni')->with('error',"OUPS UNE ERREUR EST SURVENUE");
                }

               

                
            break;
        }
    }
}
