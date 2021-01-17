<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class comptes extends Model
{
    public function getInfoCompte($numeroCompte){
        $data=null;
        try {
            $data = comptes::where("num_compte","=",$numeroCompte)->first();
        } catch (\Throwable $th) {
            $data=null;
        }
        
        return $data;
    }
}
