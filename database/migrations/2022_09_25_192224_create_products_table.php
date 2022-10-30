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
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->mediumText('summary');
            $table->longText('desc')->nullable();
            $table->longText('additional_info')->nullable() ;
            $table->longText('return_cancellation')->nullable();
            $table->string('img');
            $table->string('size_guide')->nullable();
            $table->float('price',8,2)->default(0);
            $table->float('offer_price',8,2)->default(0);
            $table->float('discount',8,2)->default(0);
            $table->integer('stock')->default(0);
            $table->string('size');
            $table->enum('status',['active','inactive'])->default('active');
            $table->enum('condition',['new','winter','popular'])->default('new');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('child_cat_id')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('child_cat_id')->references('id')->on('categories')->onDelete('SET NULL');
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('SET NULL');
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
