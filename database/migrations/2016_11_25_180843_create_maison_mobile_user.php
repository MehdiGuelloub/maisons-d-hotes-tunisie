<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaisonMobileUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maison_mobile_user', function (Blueprint $table) {
            $table->primary(['maison_id','user_id']);
            $table->integer('maison_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('maison_id')->references('id')->on('maisons')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maison_mobile_user');
    }
}
