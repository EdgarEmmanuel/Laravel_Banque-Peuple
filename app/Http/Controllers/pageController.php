<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class pageController extends Controller
{

 
    public function getLogin(){
        return view('login');
    }

    public function getPageCni(){
        return view('admin.cni');
    }

    public function getPageInsertClientSalarie(){
        $value = DB::select("SELECT count(idClient) as num FROM clients where SUBSTR(matricule,1,3) = 'BPS'");
        foreach($value as $val){
            $matriculeSalarie = 'BPS'.((int)$val->num + 1);
        }
        return view('clients.clientSalarie')->with("value",$matriculeSalarie);
    }

    public function getPageInsertClientMoral(){
        $value = DB::select("SELECT count(idClient) as num FROM clients where SUBSTR(matricule,1,3) = 'BCM'");
        foreach($value as $val){
            $matriculeMoral = 'BCM'.((int)$val->num + 1);
        }
        return view("clients.clientMoral")->with("matriculeMoral",$matriculeMoral);
    }

    public function getPageInsertClientIndependant(){
        $value = DB::select("SELECT count(idClient) as num FROM clients where SUBSTR(matricule,1,3) = 'BCI'");
        foreach($value as $val){
            $matriculeNoSalarie = 'BCI'.((int)$val->num + 1);
        }
        return view("clients.clientIndependant")->with("matriculeNoSalarie",$matriculeNoSalarie);
    }

    public function getPagInsertCompte(){
        //set the default deblocage date
        $min = \Date("Y-m-d",strtotime('+1 year'));

        //set the default date 
        $date = \Date("Y-m-d");

        //set the all data in on variable
        $dataFirst=[
            "min"=>$min,
            "date" =>$date
        ];
        return view('compte.compte')->with("first",$dataFirst);
    }


    public function getPageDisplayClient(){
        $data=DB::select("select * from client_independant");

        return view('clients.display')->with([
            "independants" => $data,
        ]);
    }

    public function getPageDisplayMoral(){
        $moraux = DB::select("select * from client_moral");
        return view("clients.displayMoral")->with([
            "moraux" => $moraux,
        ]);
    }

    public function getPageDisplaySalarie(){
        $salaries = DB::select("select * from client_salarie");

        return view("clients.displaySalarie")->with([
            "salaries" => $salaries,
        ]);
    }


    public function getPageDisplayComptes($id){
        //fetch all form the table Comptes where the IdClient 
        $res = DB::select("SELECT num_compte from comptes where id_client=?",[$id]);
        

        if($res!=null){

            //declare randomly the array for the three type of account
            $CC=[];
            $CB=[];
            $CE=[];


            //empty the array for the num of account 
            $table=[];

            foreach($res as $r){
                //push the data in the array
                array_push($table ,$r->num_compte);
            }
        
            for($i=0;$i<count($table);$i++){

                //we fetch the first second letter 
                switch($table[$i][0].$table[$i][1]){
                    case "CE" : 
                        $resCE=DB::select("SELECT * from comptes c ,compte_epargne ce  where
                        c.num_compte=? and c.idCompte=ce.id_compte",[$table[$i]]);
                       
                        //push in the global array of the CE account 
                        array_push($CE,$resCE);

                    break;
                    case "CB" : 
                        $resCB=DB::select("SELECT * from comptes c ,compte_bloque cb  where
                        c.num_compte=? and c.idCompte=cb.id_compte ",[$table[$i]]);


                        //push in the global array of teh CE account 
                        array_push($CB,$resCB);
                    break;
                    case "CC" : 
                        $resCC=DB::select("SELECT * from comptes c ,compte_courant cc  where
                        c.num_compte=? and c.idCompte=cc.id_compte",[$table[$i]]);
                        
                        //push in the global array of teh CE account 
                        array_push($CC,$resCC);
                    break;
                }
            }

            return view("compte.displayCompte")->with([
                "CE"=>$CE,
                "CC"=>$CC,
                "CB"=>$CB,
            ]);
        }else{
            return redirect("/admin/cni")->with("message","LE CLIENT NE POSSEDE PAS DE COMPTE");
        }

    }

    public function getPageDisplayOperation($id){

        //fetch all operations on that account
        $operations = DB::select("SELECT * FROM operations where id_compte=?",[$id]);
        

        //fetch the informations about the compte
        $comptes = DB::select("SELECT * FROM comptes where idCompte=?",[$id]);

        if($operations != null && $comptes!=null){
            return view("operations.displayOp")->with([
                "operations"=>$operations,
                "comptes"=>$comptes,
            ]);
        }else{
            return redirect("/admin/cni");
        }


        
    }


























}
