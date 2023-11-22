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
            $table->string('name');
            $table->string('sku', 50)->unique();
            $table->integer('quantity')->default(1);
            $table->integer('in_stock')->default(1);
            $table->integer('featured')->default(0);
            $table->integer('new_arrival')->default(0);
            $table->integer('sort_order')->default(0);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->default(0.0);
            $table->decimal('discounted_price', 10, 2)->default(0.0);
            $table->decimal('cost_price', 10, 2)->default(0.0);
            $table->enum('status', ['Selling', 'Not Selling Yet']);
            $table->timestamps();
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
