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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderid')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('payment_method');
            $table->decimal('total_price', 10, 2);
            $table->decimal('tax', 10, 2)->default(0.0);
            $table->string('status');
            $table->double('discount')->default(0.0);
            $table->string('currency', 15)->nullable();

            $table->decimal('shipping_price', 10, 2)->default(0.0);

            $table->string('shipping_address')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_postalcode')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_country')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
