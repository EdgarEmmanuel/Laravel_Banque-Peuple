<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientIndependantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_independant', function (Blueprint $table) {
            $table->increments('id_free');
            $table->string('nom');
            $table->string('prenom');
            $table->string('cni');
            $table->string('localisation');
            $table->string('activite_client');
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
        Schema::dropIfExists('client_independant');
    }
}
