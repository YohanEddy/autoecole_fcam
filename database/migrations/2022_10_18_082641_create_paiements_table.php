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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->date('datepaiement');
            $table->unsignedInteger('montant');
            $table->unsignedInteger('montant_du');
            $table->timestamps();

            $table->unsignedBigInteger('apprenant_id');
            $table->foreign('apprenant_id')->references('id')->on('apprenants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiements');
    }
};
