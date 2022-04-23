<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErejectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('erejects', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('uniId')->nullable();
            $table->string('section')->nullable();
            $table->string('year')->nullable();
            $table->string('item')->nullable();
            $table->string('ityear')->nullable();
            $table->string('itseason')->nullable();
            $table->string('ninstract')->nullable();
            $table->string('einstract')->nullable();
            $table->string('mark')->nullable();
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
        Schema::dropIfExists('erejects');
    }
}
