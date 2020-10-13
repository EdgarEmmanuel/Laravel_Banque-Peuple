<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Caissiere extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caissiere',function(Blueprint $table){
            $table->increments("id_caissiere");
            $table->string("matricule");
            $table->string("login");
            $table->string("password");
            $table->integer("id_employe")->unsigned();
            $table->foreign("id_employe")->references("id_employe")->on('employes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
