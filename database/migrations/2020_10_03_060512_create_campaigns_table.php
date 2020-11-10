<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            //google api
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->unsignedBigInteger('account_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            //
            $table->string('name');
            $table->string('objective');
            $table->string('url');
            $table->string('phone')->nullable();
            $table->string('ad_schedule', 400);
            $table->string('locations', 400);
            $table->enum('mode', ['Administrado', 'No Administrado']);
            $table->enum('type', ['Libre', 'Fijo']);
            $table->integer('monthly_cost');
            $table->integer('daily_cost');
            $table->boolean('apply_billing')->default(false);
            $table->boolean('active')->default(false);

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            // $table->string('description')->nullable();
            // $table->string('ruc', 20)->nullable();
            // $table->string('business_name', 200)->nullable();

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
        Schema::dropIfExists('campaigns');
    }
}
