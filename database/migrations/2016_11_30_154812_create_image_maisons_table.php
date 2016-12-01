<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageMaisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_maisons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('maison_id')->unsigned();
            $table->foreign('maison_id')->references('id')->on('maisons')->onDelete('cascade');
            $table->string('path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_maisons');
    }
}
