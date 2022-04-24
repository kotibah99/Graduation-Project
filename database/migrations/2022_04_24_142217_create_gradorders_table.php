<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradorders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('col')->nullable();
            $table->string('uni')->nullable();
            $table->string('special')->nullable();
            $table->string('order')->nullable();
            $table->string('percent')->nullable();
            $table->string('mom')->nullable();
            $table->string('fullname')->nullable();
            $table->string('nation')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('needs')->nullable();
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
        Schema::dropIfExists('gradorders');
    }
}
