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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('publisher_id')->nullable();
            $table->string('title')->unique();
            $table->string('slug');
            $table->string('tags')->nullable();
            $table->integer('cat_1');
            $table->integer('cat_2')->nullable();
            $table->integer('cat_3')->nullable();
            $table->integer('brand');
            $table->longText('long_desc')->nullable();
            $table->longText('image')->nullable();
            $table->string('view_count')->nullable();
            $table->string('video')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('posts');
    }
};
