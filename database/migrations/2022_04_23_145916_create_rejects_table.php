<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRejectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejects', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('dad')->nullable();
            $table->string('section')->nullable();
            $table->string('year')->nullable();
            $table->string('item')->nullable();
            $table->string('ityear')->nullable();
            $table->string('itseason')->nullable();
            $table->string('ninstract')->nullable();
            $table->string('einstract')->nullable();
            $table->string('mark')->nullable();
            $table->string('st')->nullable()->default('pendding');
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
        Schema::dropIfExists('rejects');
    }
}
