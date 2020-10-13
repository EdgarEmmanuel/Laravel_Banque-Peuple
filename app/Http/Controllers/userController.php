<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class userController extends Controller
{

    public function checkCNI(Request $request){
        //validate the field 
        $this->validate($request,[
            'matricule' => 'required'
        ]);

        //verify the length and submit if it is possible
        if(strlen($request->matricule)>=3){
            
            //fetch the data
            $matricule = $request->matricule;

            //concatenation des 3 premiers caracteres
            $DebutMat = $matricule[0].$matricule[1].$matricule[2];

            switch($DebutMat){
                //when the matricule start with 'BPS'
                case "BPS": 
                    $client = DB::select("select * from clients where matricule=? ",[$matricule]);
                    if(!empty($client)){
            
                        //we retrieve the idClient of the client 
                        foreach($client as $r){
                            $idClient = $r->idClient;
                        }
            
                        //secondly we retrieve from the specific table
                        $clientS = DB::select("select * from client_salarie where idClient=?",[$idClient]);
                        foreach($clientS as $cl){
                            $nomComplet = $cl->nom." ".$cl->prenom;
                        }

                        //set the session
                        session(["idClient" => $idClient]);
                        session(["nomCompletClient" => $nomComplet]);
            
                        return redirect('/insert/compte');
                    }else{
                        return redirect('/admin/cni')->with('error',"LE MATRICULE EST INEXISTANT !!!");
                    }
                break;

                //when the matricule start like 'BCM'
                case "BCM":
                    $client = DB::select("select * from clients where matricule=? ",[$matricule]);
                    if(!empty($client)){
            
                        //we retrieve the idClient of the client 
                        foreach($client as $r){
                            $idClient = $r->idClient;
                        }
            
                        //secondly we retrieve from the specific table
                        $clientS = DB::select("select * from client_moral where idClient=?",[$idClient]);
                        
                        foreach($clientS as $cl){
                            $nomComplet = $cl->nom_entreprise;
                        }

                        //set the session
                        session(["idClient" => $idClient]);
                        session(["nomCompletClient" => $nomComplet]);
            
            
                        return redirect('/insert/compte');
                    }else{
                        return redirect('/admin/cni')->with('error',"LE MATRICULE EST INEXISTANT !!!");
                    }
                break;

                //when the matricule strat like 'BCI'
                case "BCI":
                    $client = DB::select("select * from clients where matricule=? ",[$matricule]);
                    if(!empty($client)){
            
                        //we retrieve the idClient of the client 
                        foreach($client as $r){
                            $idClient = $r->idClient;
                        }
            
                        //secondly we retrieve from the specific table
                        $clientS = DB::select("select * from client_independant where idClient=?",[$idClient]);
                        
                        foreach($clientS as $cl){
                            $nomComplet = $cl->nom." ".$cl->prenom;
                        }

                        //set the session
                        session(["idClient" => $idClient]);
                        session(["nomCompletClient" => $nomComplet]);
            
            
                        return redirect('/insert/compte');
                    }else{
                        return redirect('/admin/cni')->with('error',"LE MATRICULE EST INEXISTANT !!!");
                    }
                break;

                default: 
                    return redirect('/admin/cni')->with('error',"LE MATRICULE EST INEXISTANT !!!");
                break;
            }
        }else{
            return redirect('/admin/cni')->with('error',"LE MATRICULE EST INEXISTANT !!!");
        }
    }


    public function logOutRespo(Request $request){
        //drop all the session
        session()->flush();

        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = $request->type;
        $login = $request->login;
        $password=$request->password;

        switch($type){
            case "responsable":
                $res = DB::select("select * from responsable_comptes where login=? and password=?",[$login,$password]);
                
                if(!empty($res)){
                    foreach ($res as $r) {
                        $mat= $r->matricule;
                        $idEmp= $r->id_employe;
                     }

                    //set the first session for the matricule 
                    session(['matricule'=>$mat]);

                    //session for the idEmploye
                    session(["id_respo" => $idEmp]);
                    
                    $employe = DB::select("select * from employes where id_employe=? ",[$idEmp]);
                    foreach($employe as $emp){
                        $Nom_respo = $emp->nom." ".$emp->prenom;
                        $idAgence = $emp->id_agence;
                    }
                    //the other sesion variable 
                    session(["nomRespo"=>$Nom_respo]);
                    session(["idAgence"=>$idAgence]);


                    //for the agence 
                    $agence = DB::select('select * from agences where id_agence=?',[$idAgence]);
                    foreach($agence as $ag){
                        $nomAgence = $ag->agence;
                    }
                    session(["nameAgence"=>$nomAgence]);

                    
                    return redirect("/admin/cni");
                }else{
                    return redirect("/");
                }
            break;
            case "caissiere": 
                $res = DB::select("SELECT * FROM caissiere c ,
                 employes em where c.login=? and
                  c.password=? and c.id_employe=em.id_employe",[$login,$password]);
                if($res==null){
                    return redirect("/");
                }else{
                    return redirect("/indexCaissiere");
                }
            break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
