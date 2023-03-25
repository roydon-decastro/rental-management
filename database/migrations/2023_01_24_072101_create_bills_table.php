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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('unit_name');
            $table->string('tenant_name');
            $table->foreignId('unit_id')->constrained();
            $table->foreignId('reading_id')->constrained();
            // $table->foreignId('tenant_id')->constrained();
            // $table->integer('curr_reading');
            $table->double('curr_reading', 6, 2);
            $table->date('curr_read_date');
            // $table->integer('prev_reading');
            $table->double('prev_reading', 6, 2);
            $table->date('prev_read_date');
            $table->double('consumption', 6, 2);
            $table->integer('prev_read_id');
            // $table->foreignId('rate_id')->constrained();
            // $table->foreignId('vat_id')->constrained();
            // $table->foreignId('service_charge_id')->constrained();
            $table->double('prev_balance', 6, 2);
            $table->double('curr_balance', 6, 2);
            $table->double('rate', 6, 2);
            $table->double('service_charge', 6, 2);
            $table->double('service_charge_rate', 6, 2);
            $table->double('vat', 6, 2);
            $table->double('total_amount_due', 6, 2);
            $table->boolean('is_paid')->default(false);
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
        Schema::dropIfExists('bills');
    }
};
