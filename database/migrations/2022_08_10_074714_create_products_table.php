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
            $table->string('name');
            $table->string('price');
            $table->string('image');
            $table->integer('kho');
            $table->string('short-desc');
            $table->string('desc');
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories');
            // $table->unsignedBigInteger('size_id');
            // $table->foreign('size_id')->references('id')->on('sizes');
            $table->integer('view');
            $table->string('images');
            $table->unsignedInteger('status');
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
