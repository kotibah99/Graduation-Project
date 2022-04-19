<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExam1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam1s', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('section')->nullable();
            $table->string('uniId')->nullable();
            $table->string('number')->nullable();
            $table->string('itemsnames')->nullable();
            $table->string('year')->nullable();
            $table->string('status')->nullable()->default('pendding');
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
        Schema::dropIfExists('exam1s');
    }
}
