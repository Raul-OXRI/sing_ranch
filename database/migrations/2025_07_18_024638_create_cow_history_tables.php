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
        Schema::create('cowhistory', function (Blueprint $table) {
            $table->id();
            $table->boolean('weight')->default(false)->nullable();
            $table->date('weight_date')->nullable();
            $table->boolean('vaccine')->default(false)->nullable();
            $table->date('vaccine_date')->nullable();
            $table->boolean('deworming')->default(false)->nullable();
            $table->date('deworming_date')->nullable();
            $table->boolean('health_check')->default(false)->nullable();
            $table->date('health_check_date')->nullable();
            $table->boolean('feel')->default(false)->nullable();
            $table->date('feel_date')->nullable();
            $table->boolean('antirabies')->default(false)->nullable();
            $table->date('antirabies_date')->nullable();
            $table->boolean('steroids')->default(false)->nullable();
            $table->date('steroids_date')->nullable();
            $table->boolean('antibiotics')->default(false)->nullable();
            $table->date('antibiotics_date')->nullable();
            $table->boolean('vitamins')->default(false)->nullable();
            $table->date('vitamins_date')->nullable();
            $table->boolean('serum')->default(false)->nullable();
            $table->date('serum_date')->nullable();
            $table->longText('notes')->nullable();
            $table->foreignId('cow_id')->constrained('cows')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cowhistory');
    }
};
