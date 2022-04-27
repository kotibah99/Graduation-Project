<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('termens', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('dad')->nullable();
            $table->string('birth')->nullable();
            $table->string('uniId')->nullable();
            $table->string('location')->nullable();
            $table->string('nation')->nullable();
            $table->string('year')->nullable();
            $table->string('date')->nullable();
            $table->string('why')->nullable();
            $table->string('pId')->nullable();
            $table->string('idCred')->nullable();
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
        Schema::dropIfExists('termens');
    }
}
