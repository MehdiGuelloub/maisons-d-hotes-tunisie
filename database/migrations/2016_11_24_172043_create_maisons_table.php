<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maisons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ville_id');
            $table->foreign('ville_id')->references('id')->on('villes');
            $table->string('name');
            $table->string('folder');
            $table->string('main_picture')->nullable();
            $table->longText('presentation')->nullable();
            $table->longText('services')->nullable();
            $table->string('longitude');
            $table->string('latitude');
            $table->longText('contact')->nullable();
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
        Schema::dropIfExists('maisons');
    }
}
