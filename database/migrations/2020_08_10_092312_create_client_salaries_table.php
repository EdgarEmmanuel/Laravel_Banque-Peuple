<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_salarie', function (Blueprint $table) {
            $table->increments('id_salarie');
            $table->string('nom');
            $table->string('prenom');
            $table->string('profession');
            $table->string('cni');
            $table->string('nom_entreprise');
            $table->string('adresse_entreprise');
            $table->integer('idClient')->unsigned();

            //foreign key
            $table->foreign('idClient')->references('idClient')->on('clients');
            
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
        Schema::dropIfExists('client_salarie');
    }
}
