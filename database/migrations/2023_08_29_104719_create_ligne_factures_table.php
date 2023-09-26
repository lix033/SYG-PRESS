<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_factures', function (Blueprint $table) {
            $table->id();
            $table->string("nomclient");
            $table->string("tarification");
            $table->string("quantites");
            $table->string("avance");
            $table->string("remise");
            $table->date("daterecup");
            $table->time("heurerecup");
            $table->string("codefacture");
            $table->date("datefacture");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ligne_factures');
    }
};
