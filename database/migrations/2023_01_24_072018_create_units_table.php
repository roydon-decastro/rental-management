<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('meralco');
            $table->enum('function', ['residential', 'commercial', 'mixed']);
            $table->enum('layout', ['Studio','1BR', '2BR', '3BR']);
            $table->enum('floor', ['1st', '2nd', '3rd', '4th', '5th']);
            $table->integer('rent');
            $table->enum('type', ['a', 'b', 'c', 'd']);
            $table->enum('meter_type', ['lxs', 'lamco']);
            $table->foreignId('property_id')->constrained();
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
        Schema::dropIfExists('units');
    }
};
