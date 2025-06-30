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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_code')->unique();
            $table->text('description')->nullable();
            $table->decimal('purchased_price', 10, 2);
            $table->decimal('sale_price', 10, 2);
            $table->integer('stock_qty')->default(0);
            $table->enum('karats', ['14K', '18K', '24K']);
            $table->unsignedBigInteger('category_id');
            $table->string('gender')->nullable(); // male, female, unisex, etc.
            $table->string('image')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
