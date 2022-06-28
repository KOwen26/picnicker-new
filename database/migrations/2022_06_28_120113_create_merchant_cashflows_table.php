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
        Schema::create('merchant_cashflow', function (Blueprint $table) {
            $table->id('merchant_cashflow_id');
            $table->string('employee_id')->nullable();
            $table->string('reference_id')->nullable();
            $table->string('reference_type')->nullable();
            $table->string('cashflow_type');
            $table->string('cashflow_amount');
            $table->string('cashflow_description')->nullable();
            $table->timestamp('cashflow_date');
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
        Schema::dropIfExists('merchant_cashflow');
    }
};