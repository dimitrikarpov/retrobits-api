<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('game_title');
            $table->string('game_rom')->nullable();
            $table->string('game_image')->nullable();
            $table->string('title');
            $table->integer('players')->default(1);
            $table->string('difficult')->nullable();
            $table->integer('rating')->nullable();
            $table->string('savefile')->nullable();
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
        Schema::dropIfExists('bits');
    }
}
