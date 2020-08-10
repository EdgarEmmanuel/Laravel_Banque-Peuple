<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientMoralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_moral', function (Blueprint $table) {
            //clientMoral
            $table->increments('idClientMoral');
            $table->string('type_entreprise');
            $table->string('activite_entreprise');
            $table->string('ninea');
            $table->string('nom_entreprise');
            $table->integer('idClient')->unsigned();

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
        Schema::dropIfExists('client_moral');
    }
}
