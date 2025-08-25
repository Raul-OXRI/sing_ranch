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
        Schema::create('seller', function (Blueprint $table) {
            $table->id();
            $table->float('unit_price', 8, 2)->nullable();
            $table->float('final_weight', 8, 2)->nullable();
            $table->float('by_sight', 8, 2)->nullable();
            $table->timestamp('token_expire')->nullable();
            $table->foreignId('cow_id')->constrained('cows')->onDelete('no action');
            $table->foreignId('cod_user')->constrained('users')->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller');
    }
};
