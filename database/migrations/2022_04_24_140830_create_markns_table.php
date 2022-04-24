<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarknsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markns', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('dad')->nullable();
            $table->string('section')->nullable();
            $table->string('uniId')->nullable();
            $table->string('mom')->nullable();
            $table->string('date')->nullable();
            $table->string('firstreg')->nullable();
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
        Schema::dropIfExists('markns');
    }
}
