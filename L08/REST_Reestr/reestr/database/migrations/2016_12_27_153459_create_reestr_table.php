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
            $table->bigInteger('g00');
            $table->string('g01');
            $table->string('g02');
            $table->string('g03');
            $table->string('g04');
            $table->string('g05');
            $table->string('g06');
            $table->string('g07');
            $table->string('g08');
            $table->string('g09');
            $table->string('g10');
            $table->string('g11');
            $table->string('g12');
            $table->string('g13');
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
