<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompteCourantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte_courant', function (Blueprint $table) {
            $table->increments('id_compte_courant');
            $table->string('adresse_employeur');
            $table->string('nom_entreprise');
            $table->string('raison_sociale');
            $table->integer('solde');
            $table->integer('id_agios')->unsigned();
            $table->integer('id_compte')->unsigned();

            //for the foreign key
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
        Schema::dropIfExists('compte_courant');
    }
}
