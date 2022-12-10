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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('url' , 255);
            $table->unsignedBigInteger('combination_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('combination_id')->references('id')->on('combinations')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');;
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
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign(['combination_id']);
            $table->dropForeign(['product_id']);
        });
        Schema::dropIfExists('images');
    }
};
