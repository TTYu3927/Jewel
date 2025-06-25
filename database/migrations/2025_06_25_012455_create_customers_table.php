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
        Schema::create('customers', function (Blueprint $table) {
        $table->id(); // Auto-incrementing ID
        $table->string('customer_name');
        $table->integer('order_quantity')->default(0);
        $table->decimal('purchased_amount', 10, 2)->default(0.00);
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->timestamp('last_login')->nullable();
        $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
