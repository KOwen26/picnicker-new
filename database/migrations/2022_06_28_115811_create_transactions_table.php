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
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('transaction_id')->primary();
            $table->string('merchant_id');
            $table->string('customer_id');
            $table->string('transaction_type');
            $table->timestamp('transaction_date');
            $table->text('transaction_notes');
            $table->decimal('transaction_total', $precision = 10, $scale = 2)->default(0);
            $table->decimal('transaction_tax', $precision = 10, $scale = 2)->default(0);
            $table->decimal('transaction_discount', $precision = 10, $scale = 2)->default(0);
            $table->decimal('transaction_grand_total', $precision = 10, $scale = 2)->default(0);
            $table->string('transaction_status');
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
        Schema::dropIfExists('transactions');
    }
};