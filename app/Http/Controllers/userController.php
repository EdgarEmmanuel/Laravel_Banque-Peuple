<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\responsableCompte;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

                    //set the first session 
                    session(['matricule'=>$mat]);
                    $employe = DB::select("select * from employes where id_employe=? ",[$idEmp]);
                    foreach($employe as $emp){
                        $Nom_respo = $emp->nom."".$emp->prenom;
                    }
                    return $Nom_respo;
                    //return session('matricule');
                }else{
                    return redirect("/");
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
