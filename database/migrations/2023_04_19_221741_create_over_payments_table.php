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
        Schema::create('over_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained();
            $table->foreignId('tenant_id')->constrained();
            $table->double('overpayment_amount', 6, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('over_payments');
    }
};
