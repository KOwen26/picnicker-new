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
        Schema::create('merchants', function (Blueprint $table) {
            $table->string('merchant_id');
            $table->string('merchant_owner_id');
            $table->foreignId('merchant_type_id');
            $table->string('city_id');
            $table->string('merchant_name');
            $table->string('merchant_slug_name');
            $table->string('merchant_phone');
            $table->string('merchant_address');
            $table->point('merchant_location')->nullable();
            $table->jsonb('merchant_pictures')->nullable();
            $table->jsonb('merchant_schedule')->nullable();
            $table->jsonb('merchant_details')->nullable();
            $table->decimal('merchant_balance_amount', $precision = 10, $scale = 2)->default(0);
            $table->text('merchant_description')->nullable();
            $table->string('merchant_open_status');
            $table->string('merchant_status');
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
        Schema::dropIfExists('merchants');
    }
};