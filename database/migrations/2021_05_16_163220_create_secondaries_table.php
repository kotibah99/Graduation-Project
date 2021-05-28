<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secondaries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('key', 12, 5)->nullable();
            $table->decimal('percent',12,5)->nullable();
            $table->unsignedInteger('primary_id');
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
        Schema::dropIfExists('secondaries');
    }
}
