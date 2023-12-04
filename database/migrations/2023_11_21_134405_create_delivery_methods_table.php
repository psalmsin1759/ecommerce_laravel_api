<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('delivery_methods', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description")->nullable();
            $table->decimal("amount", 10, 2)->default(0.0);
            $table->integer('sort_order')->default(0);
            $table->integer('status')->default(1);
            $table->integer('default_method')->default(0);
            $table->timestamps();
        });

        DB::table('delivery_methods')->insert([
            'name' => 'Standard',
            'description' => '10 business days',
            'amount' => 10.00, 
            'status' => 1, 
            'sort_order' => 0,
            'default_method' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_methods');
    }
};
