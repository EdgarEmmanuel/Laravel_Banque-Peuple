<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class comptes extends Model
{
    public function getInfoCompte($numeroCompte){
        $da = comptes::where("num_compte","=",$numeroCompte)->firstOrFail();
        return $da;
    }
}
