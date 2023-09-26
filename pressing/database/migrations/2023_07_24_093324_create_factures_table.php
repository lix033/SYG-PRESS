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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('codefacture')->unique();
            $table->string('nomclient');
            $table->string('tarification');
            $table->string('libtarif');
            $table->string('quantites');
            $table->string('paiement')->nullable();
            $table->string('remise')->nullable();
            $table->date('daterecup');
            $table->time('heurerecup');
            $table->string('total');
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
        Schema::dropIfExists('factures');
    }
};
