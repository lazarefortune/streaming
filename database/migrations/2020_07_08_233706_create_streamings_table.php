<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreamingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streamings', function (Blueprint $table) {
            $table->id();
            $table->string('forfait_name');
            $table->bigInteger('user_id');
            $table->string('forfait_type');
            $table->integer('forfait_price');
            $table->string('forfait_statut');
            $table->date('forfait_end')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('streamings');
    }
}
