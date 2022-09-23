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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->integer('duration');
            $table->integer('dha_price')->nullable();
            $table->integer('bari_price')->nullable();
            $table->integer('chit_price')->nullable();
            $table->integer('khul_price')->nullable();
            $table->integer('mym_price')->nullable();
            $table->integer('raj_price')->nullable();
            $table->integer('rang_price')->nullable();
            $table->integer('syl_price')->nullable();
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
        Schema::dropIfExists('shippings');
    }
};
