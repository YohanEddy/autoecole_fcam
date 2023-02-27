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
        Schema::create('fichesalaires', function (Blueprint $table) {
            $table->id();
            $table->date('date_paiement');
            $table->date('peiode_debut');
            $table->date('periode_fin');
            $table->double('salaire_brut')->default(0);
            $table->unsignedInteger('sal_net')->default(0);
            $table->timestamps();

            $table->unsignedBigInteger('moniteur_id');
            $table->foreign('moniteur_id')->references('id')->on('moniteurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fichesalaires');
    }
};
