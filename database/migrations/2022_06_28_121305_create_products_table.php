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
        Schema::create('products', function (Blueprint $table) {
            $table->string('product_id')->primary();
            $table->string('merchant_id');
            $table->string('product_category_id');
            $table->string('product_name');
            $table->decimal('product_sell_price', $precision = 10, $scale = 2)->default(0);
            $table->integer('product_quantity')->nullable();
            $table->json('product_picture')->nullable();
            $table->text('product_description')->nullable();
            $table->string('product_status');
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
        Schema::dropIfExists('products');
    }
};