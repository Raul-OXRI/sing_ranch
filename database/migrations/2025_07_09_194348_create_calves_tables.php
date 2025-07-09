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
        Schema::create('calves_tables', function (Blueprint $table) {
            $table->id();
            $table->string('animal_code')->unique();
            $table->date('birth_date')->nullable();
            $table->enum('sexo', ['macho', 'hembra'])->default('macho');
            $table->string('status')->default(1);
            $table->foreignId('cod_user')->references('id')->on('users')->onDelete('no action');
            $table->foreignId('cod_cow')->references('id')->on('cows')->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calves_tables');
    }
};
