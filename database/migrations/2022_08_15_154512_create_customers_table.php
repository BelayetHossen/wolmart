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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('username')->unique();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('country');
            $table->string('region');
            $table->string('zilla')->nullable();
            $table->string('thana')->nullable();
            $table->string('post')->nullable();
            $table->string('post_code')->nullable();
            $table->string('password');
            $table->boolean('status');
            $table->boolean('trash');
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
        Schema::dropIfExists('customers');
    }
};
