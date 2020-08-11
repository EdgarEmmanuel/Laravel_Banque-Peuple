<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompteEpargnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte_epargne', function (Blueprint $table) {
            $table->increments('id_compte_epargne');
            $table->integer('solde');
            $table->integer('id_compte')->unsigned();

            //foerign key
            $table->foreign('id_compte')->references('idCompte')->on('comptes');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compte_epargne');
    }
}
