<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\comptes ;
use App\compte_bloque;
use App\compte_epargne;
use App\compte_courant;

use App\Http\Controllers\notification;

class caissiereController extends Controller
{
    private $_comptes;
    private $_compteBloque;
    private $_compteEpargne;
    private $_compteCourant;

    public function __construct(comptes $comptes,compte_bloque $compteBloque
    ,compte_epargne $compteEpargne,compte_courant $compteCourant)
    {
        $this->_comptes = $comptes;
        $this->_compteBloque =$compteBloque;
        $this->_compteEpargne = $compteEpargne;
        $this->_compteCourant = $compteCourant;
    }

    public function updateCompteEpargne($montant , $idCompte ,$numeroCompte){

         //we update the account 
         $val =  $this->_compteEpargne->updateCompteEpargne($montant,$idCompte);

         if($val==null){
              //we prepare a notification 
         notification::displayMessage("error"," DEPOT DE <<".$montant." FCFA >> SUR LE NUMERO
         DE COMPTE <<".$numeroCompte.">> \n 
        ERREUR DURANT LA TRANSACTION ");

         }else{

             //we prepare a notification 
         notification::displayMessage("success"," DEPOT DE <<".$montant." FCFA >> SUR LE NUMERO
         DE COMPTE <<".$numeroCompte.">> \n 
        EFFECTUE AVEC SUCCES ");
         }

         //we return the route to redirect to the page 
         return $route="/depot.html";

    }


    public function updateCompteCourant($montant , $idCompte ,$numeroCompte){

        //we update the account 
        $val =  $this->_compteCourant->updateSoldeCompteCourant($montant,$idCompte);

        if($val==null){
             //we prepare a notification 
        notification::displayMessage("error"," DEPOT DE <<".$montant." FCFA >> SUR LE NUMERO
        DE COMPTE <<".$numeroCompte.">> \n 
       ERREUR DURANT LA TRANSACTION ");

        }else{

            //we prepare a notification 
        notification::displayMessage("success"," DEPOT DE <<".$montant." FCFA >> SUR LE NUMERO
        DE COMPTE <<".$numeroCompte.">> \n 
       EFFECTUE AVEC SUCCES ");
        }

        //we return the route to redirect to the page 
        return $route="/depot.html";

   }


    public function insertDepot(Request $request){
        //get the variable form the form
        $montant = $request->get("montant");
        $numeroCompte = $request->get("numeroCompte");

        //retrieve the data from the model
        $data=$this->_comptes->getInfoCompte($numeroCompte);
        

        if($data==null){
            //we display a notification if the account doesn't exist 
            notification::displayMessage("error","LE NUMERO DE COMPTE 
            <<".$numeroCompte.">> \n 
            N'EXISTE PAS ");

            //make a redirection
            return redirect("/depot.html");
        }else{
            //get the id of the account
            $idCompte = $data->idCompte;

            //get the type of account => you should take a look on the database
            $val = $data->num_compte[0].$data->num_compte[1];

            //variable for the direction
            $route="";

            switch($val){
                case "CB":
                    //we update the account 
                    $val = $this->_compteBloque->updateSoldeCompte($montant,$idCompte);

                    //we prepare a notification 
                    notification::displayMessage("success"," DEPOT DE <<".$montant." FCFA >> SUR LE NUMERO
                     DE COMPTE <<".$numeroCompte.">> \n 
                    EFFECTUE AVEC SUCCES ");

                    //we redirect to the page
                    $route="/depot.html";
                break;
                case "CE":
                    $route = $this->updateCompteEpargne($montant,$idCompte,$numeroCompte);
                break;
                case "CC":
                    $route = $this->updateCompteCourant($montant , $idCompte ,$numeroCompte);
                break;
            }

            return redirect($route);
        }
        

        
    }
}
