<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsableComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable_comptes', function (Blueprint $table) {
            $table->increments('id_responsable');
            $table->string('login');
            $table->string('password');
            $table->string('matricule');
            $table->integer('id_employe')->unsigned();

            //foreign key
            $table->foreign('id_employe')->references('id_employe')->on('employes');
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
        Schema::dropIfExists('responsable_comptes');
    }
}
