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
        Schema::create('rental_incomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained()->nullable();
            $table->foreignId('tenant_id')->constrained()->nullable();
            $table->double('amount', 12, 2);
            $table->enum('category', ['rent', 'parking', 'advance/deposit', 'interest', 'sales', 'labor', 'supplies', 'repair', 'fine', 'others']);
            $table->enum('payment_mode', ['cash', 'cheque', 'digital']);
            $table->date('pay_date')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('rental_incomes');
    }
};
