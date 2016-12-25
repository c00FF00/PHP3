<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mailqueue extends Migration
{
    public function up()
    {
        Schema::create('queue', function (Blueprint $table) {
            $table->increments('id');
            $table->double('message_id')->nullable();
            $table->string('email_to')->nullable();
            $table->string('user_name')->nullable();
            $table->string('message_body')->nullable();
            $table->string('message_pattern')->nullable();
            $table->string('status')->default('expect');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    
    public function down()
    {
        Schema::drop('queue');
    }
}
