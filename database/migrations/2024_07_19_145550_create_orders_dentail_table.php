<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders_dentail', function (Blueprint $table) {
            $table->increments('order_dentail_id');
            
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');

            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');

            $table->integer('quantity')->default(1);
            $table->float('price', 10, 2); // Sử dụng decimal thay vì float
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders_dentail', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['product_id']);
        });

        Schema::dropIfExists('orders_dentail');
    }
};
