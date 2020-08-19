<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        var_dump($id);
        die();
    }



}
