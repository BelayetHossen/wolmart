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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name')->nullable();
            $table->string('username')->unique();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('zilla')->nullable();
            $table->string('thana')->nullable();
            $table->string('post')->nullable();
            $table->string('post_code')->nullable();
            $table->string('shop_addr')->nullable();
            $table->string('store_name');
            $table->string('store_url');
            $table->string('bank')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('trash')->default(false);
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->longText('about')->nullable();
            $table->longText('policy')->nullable();
            $table->text('store_time')->nullable();
            $table->text('shipping_rules')->nullable();
            $table->string('review')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('vendores');
    }
};
