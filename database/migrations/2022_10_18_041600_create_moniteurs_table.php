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
        Schema::create('moniteurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_moniteur');
            $table->string('prenom_moniteur');
            $table->string('sexe');
            $table->date('date_naiss');
            $table->string('domicile_moniteur');
            $table->string('telephone');
            $table->string('nationalite');
            $table->string('email')->unique();
            $table->string('lieunaiss');
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
        Schema::dropIfExists('moniteurs');
    }
};
