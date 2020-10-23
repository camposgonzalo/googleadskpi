<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->enum('state', ['Borrador', 'Pendiente', 'Aprobado', 'Rechazado']);
            $table->enum('type', ['Crear', 'Modificar']);
            $table->enum('level', ['Campaña', 'Anuncio', 'Palabra Clave', 'Palabra Negativa ']);
            $table->string('request', 400)->nullable();

            $table->unsignedBigInteger('ad_id')->nullable();
            $table->foreign('ad_id')->references('id')->on('ads');

            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->foreign('campaign_id')->references('id')->on('campaigns');

            $table->unsignedBigInteger('keyword_id')->nullable();
            $table->foreign('keyword_id')->references('id')->on('keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
