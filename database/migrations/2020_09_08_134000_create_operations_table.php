<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments("id_operation");
            $table->string("date_operation");
            $table->string("type_operation");
            $table->integer("montant");
            $table->integer("id_employe")->unsigned();
            $table->integer("id_compte")->unsigned();
            $table->foreign("id_employe")->references("id_employe")->on("employes");
            $table->foreign("id_compte")->references("idCompte")->on("comptes");
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
        Schema::dropIfExists('operations');
    }
}
