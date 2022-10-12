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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->unsignedBigInteger('product_id');
            // $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->float('subtotal' , 8, 2)->default(0);
            $table->float('total_amount')->default(0);
            // $table->integer('quantity')->default(0);
            $table->string('coupon')->default(0)->nullable();
            $table->string('payment_method')->default('cod');
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');
            $table->enum('condition',['pending','processing','delivered','cancelled'])->default('pending');
            $table->float('delivary_charge')->default(0)->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('city');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('note')->nullable();
            $table->integer('postcode');
            $table->string('sfirst_name');
            $table->string('slast_name');
            $table->string('sphone');
            $table->text('saddress');
            $table->string('scity');
            $table->string('scountry')->nullable();
            $table->string('sstate')->nullable();
            $table->integer('spostcode');

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
        Schema::dropIfExists('orders');
    }
};
