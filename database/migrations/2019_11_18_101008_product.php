<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('id_type')->unsigned()->nullable();
            $table->foreign('id_type')->references('id')->on('type_products');
            $table->text('description');
            $table->float('price', 8, 2);
            $table->float('promotion_price',8,2);
            $table->string('image');
            $table->string('unit');
            $table->string('warranty');
            $table->string('status');
            $table->string('featured');
            $table->integer('new');
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
