<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStopregsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stopregs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('dad')->nullable();
            $table->string('col')->nullable();
            $table->string('section')->nullable();
            $table->string('year')->nullable();
            $table->string('uniId')->nullable();
            $table->string('date')->nullable();
            $table->string('nation')->nullable();
            $table->string('pId')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('stopseason')->nullable();
            $table->string('stopyear')->nullable();
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
        Schema::dropIfExists('stopregs');
    }
}
