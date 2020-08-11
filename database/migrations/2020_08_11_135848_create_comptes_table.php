<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->increments('idCompte');
            $table->string('num_compte');
            $table->string('cle_rib');
            $table->date('date-ouverture');
            $table->integer('id_client')->unsigned();
            $table->integer('id_responsable')->unsigned();
            $table->integer('id_agence')->unsigned();

            //foerign key for the id_client
            $table->foreign('id_client')->references('idClient')->on('clients');

            //foreign key for the responsable which register the account
            $table->foreign('id_responsable')->references('id_responsable')->on('responsable_comptes');

            //foreign key for the agence where the account is registred
            $table->foreign('id_agence')->references('id_agence')->on('agences');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comptes');
    }
}
