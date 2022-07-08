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
        Schema::create('merchant_owner', function (Blueprint $table) {
            $table->string('merchant_owner_id')->primary();
            $table->string('merchant_owner_name')->nullable();
            $table->string('merchant_owner_gender')->nullable();
            $table->string('merchant_owner_phone')->nullable();
            $table->string('merchant_owner_email');
            $table->string('merchant_owner_password');
            $table->string('merchant_owner_address')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('merchant_owner');
    }
};