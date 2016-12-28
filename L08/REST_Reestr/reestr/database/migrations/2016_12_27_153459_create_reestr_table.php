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
            $table->bigInteger('number_of_the_record')->nullable();
            $table->string('full_name')->nullable();
            $table->date('date_of_birth');
            $table->string('place_of_birth', 255)->nullable();
            $table->string('name_of_the_organization', 255)->nullable();
            $table->bigInteger('number_of_the_organization')->nullable();
            $table->string('post_of_the_person', 64)->nullable();
            $table->string('administrative_code', 255)->nullable();
            $table->string('punitive_organization', 255)->nullable();
            $table->string('name of_the_judge', 255)->nullable();
            $table->string('position_of_the_judge', 56)->nullable();
            $table->string('period_of_ineligibility', 56)->nullable();
            $table->date('start_date');
            $table->date('date_of_expiry');
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
