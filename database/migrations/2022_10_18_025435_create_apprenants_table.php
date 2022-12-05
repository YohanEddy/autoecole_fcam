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
        Schema::create('apprenants', function (Blueprint $table) {
            $table->id();
            $table->string('nameapp', 50);
            $table->string('prenomapp', 60);
            $table->string('sexe');
            $table->date('datenaiss');
            $table->string('profession', 300);
            $table->string('lieunaiss');
            $table->string('domicile', 200);
            $table->string('nationalite');
            $table->string('telephone', 12);
            $table->string('email')->unique();
            $table->string('attentes', 500);
            $table->string('cnxance_centre', 500);
            $table->string('permis');
            $table->date('date_inscrip');
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
        Schema::dropIfExists('apprenants');
    }
};
