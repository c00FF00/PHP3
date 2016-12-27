<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReestrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reestr', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('g00')->nullable();
            $table->string('g01')->nullable();
            $table->string('g02')->nullable();
            $table->string('g03')->nullable();
            $table->string('g04')->nullable();
            $table->string('g05')->nullable();
            $table->string('g06')->nullable();
            $table->string('g07')->nullable();
            $table->string('g08')->nullable();
            $table->string('g09')->nullable();
            $table->string('g10')->nullable();
            $table->string('g11')->nullable();
            $table->string('g12')->nullable();
            $table->string('g13')->nullable();
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
        Schema::dropIfExists('reestr');
    }
}
