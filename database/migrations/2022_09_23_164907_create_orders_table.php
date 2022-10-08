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
            $table->integer('customer_id');
            $table->longText('cart')->nullable();
            $table->string('shipping_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->integer('shipping_fee')->nullable();
            $table->string('pickup_location')->nullable();
            $table->string('total_qty')->nullable();
            $table->string('order_number')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('pay_amount')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_country')->nullable();
            $table->string('customer_region')->nullable();
            $table->string('customer_zilla')->nullable();
            $table->string('customer_thana')->nullable();
            $table->string('customer_post')->nullable();
            $table->string('customer_vill')->nullable();
            $table->string('customer_post_code')->nullable();
            $table->string('shipping_name')->nullable();
            $table->string('shipping_email')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_region')->nullable();
            $table->string('shipping_zilla')->nullable();
            $table->string('shipping_thana')->nullable();
            $table->string('shipping_post')->nullable();
            $table->string('shipping_post_code')->nullable();
            $table->string('order_note')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('coupon_discount')->nullable();
            $table->string('total_price')->nullable();
            $table->string('status')->nullable();
            $table->string('packaging')->nullable();
            $table->boolean('trash')->default(false);
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
