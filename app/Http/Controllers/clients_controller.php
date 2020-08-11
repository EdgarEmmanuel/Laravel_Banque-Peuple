<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;



class clients_controller extends Controller
{

    public static function insertInClients($email,$telephone,$matricule){
        $id = DB::table('clients')->insertGetId([
            'telephone'=>$telephone,
            'email'=> $email ,
            'matricule'=>$matricule
        ]);
        return $id;
    }



    public function insertClientSalarie(Request $request){
        //validate the post request
        $this->validate($request,[
            'nom'=>'required',
            'prenom'=>'required',
            'adresseforCl'=>'required',
            'telephone'=>'required',
            'email'=>'required',
            'matricule'=>'required',
            'profession'=>'required',
            'nom_Entreprise'=>'required',
            'cni'=>'required'
        ]);

        //return $request;

        //firstly insert in the table clients
        $idClient = clients_controller::insertInClients($request->email,$request->telephone,$request->matricule);

        //insert in the table client_salarie
        $res = DB::table('client_salarie')->insert([
            "nom"=>$request->nom,
            "prenom" => $request->prenom,
            "profession" => $request->profession,
            "cni" => $request->cni,
            "nom_entreprise" => $request->nom_Entreprise,
            "adresse_entreprise" => $request->adresseforCl,
            "idClient" => $idClient
        ]);
        
        if($res!=0){
            return redirect("/admin/cni")->with('success',"INSERTION CLIENT SALARIE REUSSIE");
        }else{
            return redirect("/admin/cni")->with('error',"INSERTION IMPOSSIBLE");
        }

    }



    public function InsertClientIndependant(Request $request){
        $this->validate($request,[
            "nom"=>'required',
            'prenom' => 'required',
            'cni' => 'required',
            'email' => 'required',
            'matricule' => 'required',
            'localisation' => 'required',
            'activite' => 'required',
            'telephone' => 'required'
        ]);

        //firstly insert in the table clients
        $idClient = clients_controller::insertInClients($request->email,$request->telephone,$request->matricule);

        //secondly insert in the table client_independant
        $res = DB::table('client_independant')->insert([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'cni' => $request->cni,
            'localisation' => $request->localisation, 
            'activite_client' => $request->activite,
            'idClient' => $idClient
        ]);

        if($res!=0){
            return redirect("/admin/cni")->with('success',"INSERTION CLIENT INDEPENDANT REUSSIE ");
        }else{
            return redirect("/admin/cni")->with('error',"INSERTION IMPOSSIBLE");
        }
    }




    public function insertClientMoral(Request $request ){
        $this->validate($request,[
            'nom' => 'required',
            'email' => 'required',
            'matricule' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'type' => 'required',
            'ninea' => 'required',
            'activite' => 'required'
        ]);

         //firstly insert in the table clients
         $idClient = clients_controller::insertInClients($request->email,$request->telephone,$request->matricule);

         //secondly insert in the client_moral table

         $resultat = DB::table('client_moral')->insert([
            "type_entreprise" => $request->type,
            "activite_entreprise" => $request->activite,
            "ninea" => $request->ninea,
            "nom_entreprise" => $request->nom,
            "idClient" => $idClient
         ]);

            //redirection after  verify 
         if($resultat!=0){
            return redirect("/admin/cni")->with('success',"INSERTION CLIENT MORAL REUSSIE ");
        }else{
            return redirect("/admin/cni")->with('error',"INSERTION IMPOSSIBLE");
        }




    }











}
