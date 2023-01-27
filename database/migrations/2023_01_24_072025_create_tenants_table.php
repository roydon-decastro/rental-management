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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('id_type')->nullable();
            $table->string('id_number')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('plate')->nullable();
            $table->string('email')->unique()->nullable();
            $table->date('dob');
            $table->enum('sex', ['m', 'f']);
            $table->foreignId('unit_id')->constrained();
            $table->boolean('is_current')->default(false);
            $table->boolean('is_primary')->default(false);
            $table->boolean('has_parking')->default(false);
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
        Schema::dropIfExists('tenants');
    }
};
