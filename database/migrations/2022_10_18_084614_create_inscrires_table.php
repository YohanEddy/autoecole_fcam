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
        Schema::create('inscrires', function (Blueprint $table) {
            $table->id();
            $table->integer('periode');
            $table->string('modalite');
            $table->timestamps();

            $table->unsignedBigInteger('apprenant_id');
            $table->foreign('apprenant_id')->references('id')->on('apprenants')->onDelete('cascade');
            $table->unsignedBigInteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscrires');
    }
};
