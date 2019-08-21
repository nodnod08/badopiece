<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_photo');
            $table->string('product_name');
            $table->string('product_code');
            $table->integer('product_price');
            $table->integer('product_price_previous');
            $table->string('product_size');
            $table->string('product_category');
            $table->integer('product_stocks');
            $table->string('product_desc');
            $table->string('product_date');
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
}
