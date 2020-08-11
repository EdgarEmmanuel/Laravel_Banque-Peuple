<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompteBloquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte_bloque', function (Blueprint $table) {
            $table->increments('id_compte_bloque');
            $table->date('date_deblocage');
            $table->integer('solde');
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
        Schema::dropIfExists('compte_bloque');
    }
}
