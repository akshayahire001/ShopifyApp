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
        Schema::create('vendors_product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vendor_id')->nullable();
            $table->bigInteger('shopify_product_id')->nullable();
            $table->string('product_name', 255)->nullable();
            $table->longText('description')->nullable();
            $table->string('vendor_name', 255)->nullable();
            $table->longText('product_json')->nullable();
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
        Schema::dropIfExists('vendors_product');
    }
};
